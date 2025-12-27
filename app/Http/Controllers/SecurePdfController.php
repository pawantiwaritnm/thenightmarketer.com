<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SecurePdfController extends Controller
{
    // public viewer page — generates a signed stream URL and passes it to the blade
    public function viewerPage($id)
    {
        // increase expiry for reasonable session (adjust as needed)
        $signedUrl = URL::temporarySignedRoute(
            'secure.pdf.stream',
            now()->addMinutes(60), // 60 minutes expiry - adjust if you want longer
            ['id' => $id]
        );

        $viewer = [
            'name'  => 'Guest Viewer',
            'email' => null,
        ];

        return view('secure-pdf-viewer', compact('id', 'viewer', 'signedUrl'));
    }

    // stream the PDF bytes — only if the signed URL is valid
    public function stream(Request $request, $id)
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Unauthorized or expired link');
        }

        // NOTE: file is under public/private/pdfs/company-profile.pdf
        $path = public_path('private/pdfs/company-profile171225old.pdf');

        if (! file_exists($path)) {
            abort(404, 'PDF not found');
        }

        // Use response()->file to let PHP/webserver handle headers & range requests
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="company-profile171225old.pdf"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
        ]);
    }

    // optional helper to create a signed viewer link (not the stream)
    public function signedLink($id)
    {
        $url = URL::temporarySignedRoute(
            'secure.pdf.viewer',
            now()->addMinutes(60),
            ['id' => $id]
        );

        return response()->json(['url' => $url]);
    }
    
}
