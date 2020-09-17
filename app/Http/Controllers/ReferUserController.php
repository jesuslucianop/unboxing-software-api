<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Refer;
use Config;

class ReferUserController extends UserController
{
    
    protected $user;

    /**
     * Referreds registration function
     * @param \Illuminate\Http\Request  $request
     * @return response
    */
    public function addReferred( Request $request ){

         // Making request validations // 
         $validator = Validator::make( $request->all(), [
            'name' => ['required','string','max:255'],
            'lastName' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'phone' => ['required','string'], 
            'identification' => ['required','string'], 
            'idStatus' => ['string'],
            'idUser' => ['string'],
            
            ]);
            
            $user_referring = JWTAuth::toUser(JWTAuth::getToken());

            if( $validator -> passes() ){

                if( $this->hasBeenReferred( $request ) ){
                        $this->responseMessage = ['error' => Config::get('constants.messages.user_referred_error'),'status' => 400 ];
                }

                else{

                // Creating Referred User //
                    $this->user = Refer::create([
                        'name' => $request->get('name'),
                        'lastName' => $request->get('lastName'),
                        'email' => $request->get('email'), 
                        'phone' => $request->get('phone'),
                        'identification' => $request->get('identification'),
                        'idStatus' => 3 ,
                        'idUser' => $user_referring->idUser,
                    ]);

  
                    $this->responseMessage = ['success' => Config::get('constants.messages.user_referred_successful'),'status' => 200 ];
                }
                }
                else if ($validator->fails()) {
                    $this->responseMessage = ['request_failed' =>  $validator->errors()->toJson(),'status' => 400];
                }
                
                
                $this->data = [
                    'status' => true, 
                    'data' => [
                    'User' => $this->user
                    ],
                    'message' => $this->responseMessage
                ];

            return responseJson( $this->data,  $this->responseMessage );

    }

    /**
     * User has been referred function
     * @param \Illuminate\Http\Request  $request
     * @return bool
    */

    public function hasBeenReferred( $request ){

        if( Refer::where('identification', '=', $request->get('identification'))->exists() ){
            return true;
        }
        else{

            return false;
        }
    } 


}
