<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
	public function auth(Request $request)
	{
		$credentials = $request->only('email', 'password', 'device_name');

		$client = Client::where('email', $credentials['email'])->first();
		if (!$client) {
			return response()->json([
				'message' => 'Client not found'
			], 404);
		}
		if (!Hash::check($credentials['password'], $client->password)) {
			return response()->json([
				'message' => 'Invalid password'
			], 401);
		}

		$token = $client->createToken($credentials['device_name']);
		$response = [
			'client' => $client,
			'token' => $token->plainTextToken,
		];
		return response($response);
	}

	public function me(Request $request)
	{
		$client = $request->user();
		return ClientResource::make($client);
	}

	public function logout(Request $request)
	{
		$request->user()->tokens()->delete();
		return response()->json([
			'message' => 'Logged out'
		]);
	}

}
