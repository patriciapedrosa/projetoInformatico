<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginControllerAPI extends Controller
{
    public function loginControladorManager(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user == null || !$user->isControladorManager()) {
            return response()->json(
                ['error' => 'Unauthorized'], 401);
        }
        $http = new \GuzzleHttp\Client;
        $response = $http->post($_ENV['APP_URL'] . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => $_ENV['CLIENT_SECRET'],
                'username' => $user->email,
                'password' => $request->password,
                'scope' => '',
            ],
            'exceptions' => false,
        ]);
        $errorCode = $response->getStatusCode();
        if ($errorCode == '200') {
            return json_decode((string) $response->getBody(), true);
        } else {
            return response()->json(['error' => 'User credentials invalid'], $errorCode);
        }
    }
}
