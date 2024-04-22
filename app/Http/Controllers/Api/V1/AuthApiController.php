<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\AuthApiRequest;
use Illuminate\Support\Facades\Http;

class AuthApiController extends Controller
{
    public function auth( AuthApiRequest $request )
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($host .'/auth', $request->all());

        return $response->json();
    }
}
