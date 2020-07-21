<?php
/**
 * User: phmiranda
 * Project: controle-series-v2
 * Description: this file execute...!
 * Date: 20/07/2020
 */

namespace App\Http\Middleware;

use App\User;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Autenticador {
    public function handler(Request $request, Closure $next) {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new Exception();
            }

            $header = $request->header('Authorization');
            $token = str_replace('Bearer ','',$header);
            $data = JWT::decode($token, env('JWT_KEY'), ['HS256']);
            $usuario = User::where('email', $data->email)->first();

            if (is_null($usuario)) {
                throw new Exception();
            }

            return $next ($request);
        }catch (Exception $exception){
            return response()->json('Não autorizado a acessar recursos',401);
        }
    }
}
