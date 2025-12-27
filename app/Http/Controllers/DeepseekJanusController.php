<?php
// app/Http/Controllers/DeepseekJanusController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DeepseekJanusController extends Controller
{
    public function generate(Request $req)
    {
        $req->validate([
            'prompt' => 'required|string|max:1200',
            // optional: 'width' => 'integer', 'height' => 'integer'
        ]);

        $repo = env('HF_JANUS_REPO', 'deepseek-ai/Janus-Pro-7B');

        $client = new Client(['timeout' => 180]);
        $resp = $client->post("https://api-inference.huggingface.co/models/{$repo}", [
            'headers' => [
                'Authorization' => 'Bearer ' . env('HF_TOKEN'),
                'Accept'        => 'image/png',
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'inputs' => $req->prompt,
                // 'parameters' => ['width' => 1024, 'height' => 1024], // if supported
            ],
        ]);

        $bytes = (string) $resp->getBody();
        $filename = 'generated/' . now()->format('Ymd_His') . '_' . Str::random(6) . '.png';
        Storage::disk('public')->put($filename, $bytes);

        return response()->json([
            'image_url' => asset('storage/' . $filename),
            'file'      => $filename,
        ]);
    }
}
