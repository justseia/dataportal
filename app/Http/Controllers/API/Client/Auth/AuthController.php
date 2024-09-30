<?php

namespace App\Http\Controllers\API\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        $client = Client::query()->where('email', $credentials['email'])->first();

        if (!$client || !Hash::check($credentials['password'], $client->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $token = $client->createToken('client-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'token' => $token,
            'client' => $client,
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:8|confirmed',
            'client_type_id' => 'required|string|max:255|exists:client_types,id',
        ]);

        $client = Client::query()->create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_number' => $validatedData['phone_number'],
            'organization' => $validatedData['organization'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'client_type_id' => $validatedData['client_type_id'],
        ]);

        $token = $client->createToken('client-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'token' => $token,
            'client' => $client,
        ]);
    }

    public function forgot(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:clients,email',
        ]);

        $status = Password::broker('clients')->sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => __($status),
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => __($status),
        ], 400);
    }

    public function reset(Request $request): JsonResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:clients,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::broker('clients')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response()->json([
                'status' => true,
                'message' => __($status),
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => __($status),
        ], 400);
    }
}
