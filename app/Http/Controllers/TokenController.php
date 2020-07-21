<?php
/**
 * User: phmiranda
 * Project: controle-series-v2
 * Description: this file execute...!
 * Date: 20/07/2020
 */

namespace App\Http\Controllers;


use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller {
    public function autenticar(Request $request) {
        $this->validate($request, [
           'email' => ' required | email',
           'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->first();

        if (is_null($usuario) || !Hash::check($request->password, $usuario->password)) {
            return response()->json('Usuário ou senha inválidos', 401);
        }

        $token = JWT::encode(['email' => $request->email],env('JWT_KEY'));

        return  [
            'token' => $token
        ];
    }
}
