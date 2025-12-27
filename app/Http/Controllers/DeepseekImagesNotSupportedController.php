<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeepseekImagesNotSupportedController extends Controller
{
    public function generate(Request $req)
    {
        return response()->json([
            'error'      => 'Image generation is not available via the direct DeepSeek API.',
            'workaround' => 'Use DeepSeek to create the image prompt and store/display it, or bypass this step.',
        ], 501);
    }
}