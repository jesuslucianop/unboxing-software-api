<?php

namespace App\Http\Middleware;

// requiring necessary rutes
use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class JwtMiddleware extends BaseMiddleware
{
    /** 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $responseMessage;

    public function handleAuthenticationToken( $request, Closure $next )
    {   
        try {   
             $user = JWTAuth::parseToken()->authenticate();
        }

        catch( Exception $e ){

            if ( $e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException ){
                
                $this->responseMessage = ['error' => Config::get('constants.messages.invalid_token'),'code' => 1];
                return responseJson( null,false, $this->responseMessage);

            }
            else if ( $e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException ){
               
                $this->responseMessage = ['message' => Config::get('constants.messages.token_expired'),'code' => 1];
                return responseJson( null,false, $this->responseMessage );

            }

            else if ($e->getMessage() === 'User Not Found' )
            {
                $this->responseMessage = ['message' => $e->getMessage(),'code' => 1];
                return responseJson( null,false, $this->responseMessage );


            }

            else 
            {
                $this->responseMessage = ['message' => Config::get('constants.messages.authentication_token_not_found'),'code' => 1];
                return responseJson( null,false, $this->responseMessage );
        }

        return $next( $request );
    }
}
}
