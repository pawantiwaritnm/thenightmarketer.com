<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Assuming your admin model is named Admin


class CustomLoginController extends Controller
{

    public function index(Request $request)
    {  
       
        //prd(auth()->guard('admin')->user());
        if (auth()->guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        }
        $method = $request->method();

        if ($method == 'POST') {

            $rules = [];
            $rules['username'] = 'required';
            $rules['password'] = 'required';

            $this->validate($request, $rules);

            $username = $request->input('username');
            $password = $request->input('password');

            // Try to login with email first
            if (auth()->guard('admin')->attempt(['email' => $username, 'password' => $password])) {
                $user = auth()->guard('admin')->user();
                $role = $user->role;
                session(['role' => $role]);
                return redirect()->route('admin.dashboard');
            }
            // If email fails, try with name
            elseif (auth()->guard('admin')->attempt(['name' => $username, 'password' => $password])) {
                $user = auth()->guard('admin')->user();
                $role = $user->role;
                session(['role' => $role]);
                return redirect()->route('admin.dashboard');
            }
            else {
                // Authentication failed, show error message
                return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
            }
        }
        return view('admin.pages.login');
    }
    public function auth(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Try to login with email first
        if (auth()->guard('admin')->attempt(['email' => $username, 'password' => $password])) {
            $user = auth()->guard('admin')->user();
            $role = $user->role;
            session(['role' => $role]);
            return redirect('admin');
        }
        // If email fails, try with name
        elseif (auth()->guard('admin')->attempt(['name' => $username, 'password' => $password])) {
            $user = auth()->guard('admin')->user();
            $role = $user->role;
            session(['role' => $role]);
            return redirect('admin');
        }
        else {
            $errors['err_msg'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Your username or password is wrong</strong>.</div>';
            return back()->with($errors);
        }
    }

    public function logout(Request $request)
{
    
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    return redirect()->route('login'); 
}
    

    // public function login(Request $request)
    // {  
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);
    //     // Attempt to retrieve the user by email
    //     $user = Admin::where('name', $validated['username'])->first();
    //     // If user not found or password doesn't match, return error
    //     if (!$user || !password_verify($validated['password'], $user->password)) {
    //         return back()->withErrors(['error' => 'Invalid email or password']);
    //     }
    //      // Check if the user's status is active
    //     if ($user->status != 1) {
    //         return back()->withErrors(['error' => 'Your account is not active']);
    //     }
    //     // Set session variables for admin details
    //     Session::put('admin_id', $user->id);
    //     Session::put('admin_name', $user->name);
    //     // Authenticate the user
    //     // Redirect authenticated user to dashboard or desired route
    //     return redirect()->route('user-list');
    // }
}