<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyProfileDownloadMail;

class CompanyProfileController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'company_name' => 'nullable|string|max:255',
            'captcha_answer' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ]);
        }

        // 🔢 Verify math captcha
        if ((int)$request->captcha_answer !== session('company_profile_captcha')) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect captcha answer'
            ], 400);
        }

        // 💾 Store in contacts table
        $contact = Contact::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'company_name' => $request->company_name,
            'type'         => 'download_company_profile',
        ]);

        // 📧 Send Email to Admin
        Mail::to('thenightmarketer@gmail.com')
            ->send(new CompanyProfileDownloadMail([
                'name'         => $contact->name,
                'email'        => $contact->email,
                'phone'        => $contact->phone,
                'company_name' => $contact->company_name,
            ]));

        // ✅ Allow PDF access
        session(['company_profile_allowed' => true]);

        // ❌ remove captcha
        session()->forget('company_profile_captcha');

        return response()->json([
            'success'  => true,
            'redirect' => route('secure.pdf.viewer', 'company-profile')
        ]);
    }
}
