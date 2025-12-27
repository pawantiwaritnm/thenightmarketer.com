<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DeepSeekController extends Controller
{

    public function chat(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:5000',
        ]);

        $apiKey = trim((string) env('DEEPSEEK_API_KEY'));
        if (!$apiKey) {
            return response()->json(['error' => 'DeepSeek API key missing'], 500);
        }

        try {
            $client = new Client([
                'base_uri' => rtrim(env('DEEPSEEK_BASE', 'https://api.deepseek.com'), '/') . '/v1/',
                'timeout'  => 60,
            ]);

            $resp = $client->post('chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'    => env('DEEPSEEK_MODEL', 'deepseek-chat'),
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                        ['role' => 'user',   'content' => $request->input('prompt')],
                    ],
                    'stream'   => false,
                ],
            ]);

            $data = json_decode($resp->getBody(), true);
            return response()->json([
                'content' => $data['choices'][0]['message']['content'] ?? 'No response.',
                'usage'   => $data['usage'] ?? null,
            ]);
        } catch (RequestException $e) {
            // Pass through DeepSeek error message (401/400/etc.) but don’t leak your key
            $body = $e->getResponse() ? (string) $e->getResponse()->getBody() : null;
            return response()->json([
                'error' => $e->getMessage(),
                'deepseek' => $body,
            ], $e->getResponse() ? $e->getResponse()->getStatusCode() : 500);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
