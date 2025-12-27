<?php

namespace App\Http\Controllers;

use App\Models\DemoRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\DemoRequestMail;
use Illuminate\Support\Facades\Mail;

class DemoRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'country'      => ['required', 'string', 'max:100'],
            'country_code' => ['required', 'string', 'max:10'],
            // 'location'     => ['required', Rule::in(['India','Outside India'])],
            'name'         => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:190'],
            'phone'        => ['required', 'string', 'max:30'],
            'industry'     => ['required', Rule::in(['Travel', 'Education', 'Healthcare', 'Finance', 'Real Estate', 'Other'])],
            'team_size'    => ['required', Rule::in(['1-50', '51-100', '101-200', '201+'])],
            'company'      => ['required', 'string', 'max:190'],
        ]);

        $data['ip'] = $request->ip();
        $data['user_agent'] = substr($request->userAgent() ?? '', 0, 255);

       $demo = DemoRequest::create($data);
        // Attempt to send mail but swallow errors
        try {
            Mail::to('raghav@thenightmarketer.com')->send(new DemoRequestMail($demo));
        } catch (\Throwable $th) {
            \Log::error('Demo Request Mail Error: ' . $th->getMessage());
            // No need to throw again; user won't see this error
        }

        return response()->json([
            'ok' => true,
            'message' => 'Thanks! Your demo request is booked.',
            // 'redirect_url' => route('login') // or any URL
        ]);
    }
}
