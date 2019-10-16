<?php

namespace App\Http\Middleware;

use App\Services\Http\Response;
use App\User;
use Closure;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->get('token');

        if(!$token)
        {
            // Unauthorized response if token not there
            return Response::returnResponse('error', 'Unauthorized.', 401);
        }
        try
        {
            $credentials = JWT::decode($token, env('JWT_KEY'), ['HS256']);
        }
        catch(ExpiredException $e)
        {
            return Response::returnResponse('error', 'Provided token is expired.', 400);
        }
        catch(Exception $e)
        {
            return Response::returnResponse('error',
                'Unauthorized.', 400);
        }

        $user = User::find($credentials->sub);
        // Now let's put the user in the request class so that you can grab it from there

        $request->auth = $user;

        return $next($request);
    }
}
