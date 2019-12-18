<?php

namespace App\Http\Middleware;

use App\Response\responseTrait;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use JWTFactory;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use JWTAuthException;


class jwtAuthMiddlWare
{
    use responseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $token = $request->input('token');
//
//        if(!$token){
//            return "Token Require";
//        }
        $token = $request->input('token');
//        if(!$token){
//            return response()->json([
//                'status' => 'FAIL',
//                'status_code' => '400',
//                'message' => 'Token Require'
//            ]);
//        }
        try {
            if (!$user = \Tymon\JWTAuth\Facades\JWTAuth::toUser(JWTAuth::getToken())) {
                return $this->respondErrorToken('userNotFound');
            }
        } catch (TokenExpiredException $e) {
            return $this->respondErrorToken('Token Expired!');
        } catch (TokenInvalidException $e) {
            return $this->respondErrorToken('Token Invalid!');
        } catch (JWTException $e) {
            return $this->respondErrorToken('Token Require!');
        }

        return $next($request);
    }
}
