<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Process admin login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Find user by username or email
        $user = User::where(function($query) use ($username) {
                $query->where('username', $username)
                      ->orWhere('email', $username);
            })
            ->where('status', 1) // Only active users
            ->first();

        // Check if user exists and password matches (MD5 for now)
        if ($user && $user->checkPasswordMd5($password)) {
            // Log the user in
            Auth::login($user);

            // Store additional session data for compatibility
            Session::put('admin_id', $user->id);
            Session::put('admin_role', $user->role);
            Session::put('admin_data', $user);
            Session::put('logged_in', true);

            return response()->json([
                'status' => 1,
                'message' => 'Login successful',
                'redirect' => route('admin.dashboard')
            ]);
        }

        return response()->json([
            'status' => 0,
            'msg' => 'Invalid username or password'
        ]);
    }

    /**
     * Logout admin user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();

        try {
            // Get dashboard statistics
            $stats = [
                'total_projects' => $this->getTotalProjects(),
                'total_employees' => $this->getTotalEmployees(),
                'total_seo' => $this->getTotalSEO(),
                'total_smm' => $this->getTotalSMM(),
            ];

            // Get today's reminders
            $todayReminders = $this->getTodayReminders();

            // Get upcoming reminders
            $upcomingReminders = $this->getUpcomingReminders();

            return view('admin.pages.dashboard', compact('stats', 'todayReminders', 'upcomingReminders'));
        } catch (\Exception $e) {
            \Log::error('Dashboard error: ' . $e->getMessage());

            // Return dashboard with empty data if error occurs
            $stats = [
                'total_projects' => 0,
                'total_employees' => 0,
                'total_seo' => 0,
                'total_smm' => 0,
            ];
            $todayReminders = [];
            $upcomingReminders = [];

            return view('admin.pages.dashboard', compact('stats', 'todayReminders', 'upcomingReminders'));
        }
    }

    /**
     * Helper methods for dashboard statistics
     */
    private function getTotalProjects()
    {
        try {
            return DB::table('add_projects')
                ->where('status', '!=', -1)
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    private function getTotalEmployees()
    {
        try {
            return User::where('status', 1)->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    private function getTotalSEO()
    {
        try {
            return DB::table('seo')
                ->where('status', '!=', -1)
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    private function getTotalSMM()
    {
        try {
            return DB::table('smm_report')
                ->where('status', '!=', -1)
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    private function getTodayReminders()
    {
        try {
            $today = date('Y-m-d');

            return DB::table('add_reminders')
                ->leftJoin('client_master', 'client_master.id', '=', 'add_reminders.client_id')
                ->select('add_reminders.*', 'client_master.company_name')
                ->where('add_reminders.date', $today)
                ->where('add_reminders.status', '!=', -1)
                ->orderBy('add_reminders.id', 'desc')
                ->limit(10)
                ->get();
        } catch (\Exception $e) {
            return [];
        }
    }

    private function getUpcomingReminders()
    {
        try {
            $today = date('Y-m-d');

            return DB::table('add_reminders')
                ->leftJoin('client_master', 'client_master.id', '=', 'add_reminders.client_id')
                ->select('add_reminders.*', 'client_master.company_name')
                ->where('add_reminders.date', '>', $today)
                ->where('add_reminders.status', '!=', -1)
                ->orderBy('add_reminders.date', 'asc')
                ->limit(10)
                ->get();
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Legacy CRM methods for compatibility
     */
    public function user_list()
    {
        try {
            $users = User::where('status', '!=', -1)->get();
            return view('admin.crm.users.index', compact('users'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Users list is not available yet.');
        }
    }

    public function add_user()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Add user functionality coming soon.');
    }

    public function role_form_create(Request $request)
    {
        return redirect()->route('admin.dashboard')->with('info', 'User creation functionality coming soon.');
    }

    public function role_list()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Roles management coming soon.');
    }

    public function add_role()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Add role functionality coming soon.');
    }

    public function all_app_list()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Apps management coming soon.');
    }

    public function add_app()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Add app functionality coming soon.');
    }

    public function requirements_list()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Requirements management coming soon.');
    }

    public function add_requirements()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Add requirements functionality coming soon.');
    }

    public function project_list()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Old projects view coming soon.');
    }

    public function add_project()
    {
        return redirect()->route('admin.dashboard')->with('info', 'Add old project functionality coming soon.');
    }

    public function update_status(Request $request)
    {
        return response()->json(['message' => 'Status update functionality coming soon.']);
    }

    public function delete_data(Request $request)
    {
        return response()->json(['message' => 'Delete functionality coming soon.']);
    }
}
