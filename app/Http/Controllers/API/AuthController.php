<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Auth;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        $token = $user->createToken('UserToken')->accessToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
            'message' => 'Usuario registrado exitosamente.',
        ], 200);

    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('UserToken')->accessToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
                'message' => 'Usuario logeado exitosamente.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'No autorizado.'
            ], 401);
        }


    }

    public function user()
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

    public function logout()
    {
        $user = auth()->user(); //->token()
        //$user->revoke(); para eliminar solo la token del dispositivo
        $tokens = $user->tokens->pluck('id');
        Token::whereIn('id', $tokens)
            ->update(['revoked' => true]);

        RefreshToken::whereIn('access_token_id', $tokens)->update(['revoked' => true]);
        return response()->json(['message' => 'Usuario deslogeado exitosamente.'], 200);
    }
}
