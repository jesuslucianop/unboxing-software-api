<?php
namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Illuminate\Http\JsonResponse;
    use App\Rules\PasswordValidation;
    use App\Rules\PhoneNumberValidation;
    use App\Rules\IDValidation;
    use Config;
    use JWTAuth;

class UserController extends Controller
{
    //class properties
    protected $data = [];
    protected $responseMessage;
    protected $user;

    public function __construct()
    {
        $this->data = [
        'status' => false,
        'code' => 401,
        'data' => null,
        'err' => [ 'code' => 1 ]
        ];

    }

    /**
     *Users Authentication function
     * @param \Illuminate\Http\Request  $request
     * @return response
    */

    public function authenticate( Request $request )
    {
        $credentials = $request->only( 'email', 'password' );

        try {
            if ( ! $token = JWTAuth::attempt( $credentials ) ) {
                $this->responseMessage = ['error' => Config::get('constants.messages.invalid_credentials'),'status'=> 400];
            }

            else{

                $this->responseMessage = ['Success' => Config::get('constants.messages.user_authenticated_successfully'),'status' => 200];
            }

            $this->data = [
                'data' => [
                    'token' => $token
                ],
                'message' => $this->responseMessage
            ];

        } catch ( JWTException $e ) {
            $this->responseMessage = ['error' => Config::get('constants.messages.could_not_create_token'),'status' => $e->getStatusCode() ];
        }

        return responseJson( $this->data,$this->responseMessage);
    }
    /**
     * Retrive authenticated User function
     * @return response
    */

    public function getAuthenticatedUser()
    {
        $this->responseMessage = ['success' => Config::get('constants.messages.user_authenticated_successfully'),'status' => 200];

        try {
            if ( !$user = JWTAuth::toUser(JWTAuth::getToken()) ) {
                    $this->responseMessage = ['error' => Config::get('constants.messages.user_not_found'),'status' => $e->getStatusCode()];

            }
            } catch ( Tymon\JWTAuth\Exceptions\TokenExpiredException $e ) {
                    $this->status = $e->getStatusCode();
                    $this->responseMessage = ['error' => Config::get('constants.messages.token_expired'),'status' => $e->getStatusCode()];

            } catch ( Tymon\JWTAuth\Exceptions\TokenInvalidException $e ) {
                    $this->status = $e->getStatusCode();
                    $this->responseMessage = ['error' => Config::get('constants.messages.invalid_token'),'status' => $e->getStatusCode()];
            } catch ( Tymon\JWTAuth\Exceptions\JWTException $e ) {
                     $this->status = $e->getStatusCode();
                    $this->responseMessage = ['error' => Config::get('constants.messages.token_absent'),'status' => $e->getStatusCode()];
            }

            $this->data = [
                'status' => true,
                'data' => [
                'User' => $user
                ],
                'Message' => $this->responseMessage
            ];

            return responseJson($this->data, $this->responseMessage);
    }

    /**
     *Users registration function
     * @param \Illuminate\Http\Request  $request
     * @return response
    */
    public function register( Request $request )
        {

              // Making request validations //
                $validator = Validator::make( $request->all(), [
                'name' => ['required','string','max:255'],
                'lastName' => ['required','string','max:255'],
                'email' => ['required','string','email','max:255','unique:users'],
                'password' => ['required', 'string', 'min:6'],
                'address' => ['required','string','max:255'],
                'identification' => ['required','string','max:20'],
                'phone' => ['required','string'],

                ]);

                if( $validator -> passes() ){


                    // creating user //
                        $this->user = User::create([
                            'name' => $request->get('name'),
                            'lastName' => $request->get('lastName'),
                            'address' => $request->get('address'),
                            'identification' => $request->get('identification'),
                            'notification' => $request->get('notification'),
                            'email' => $request->get('email'),
                            'phone' => $request->get('phone'),
                            'idRefer' => $request->get('idRefer'),
                            'percent' => $request->get('percent'),
                            'password' => Hash::make($request->get('password')),
                        ]);



                        $token = JWTAuth::fromUser( $this->user );



                        $this->responseMessage = ['success' => Config::get('constants.messages.user_registration_successful'),'status' => 200];

                }

                else if ($validator->fails()) {
                    $this->responseMessage = ['request_failed' =>  $validator->errors()->toJson(),'status' => 400];
                }


                $this->data = [
                    'data' => [
                    'User' => $this->user
                    ],
                    'message' => $this->responseMessage
                ];

                return responseJson( $this->data, $this->responseMessage);
        }

        /**
         *Logout User function
        * @return response
        */

        public function logout()
        {
            $this->responseMessage = ['error' => Config::get('constants.messages.user_logout'),'status'=> 200];

            auth()->logout();

            $this->data = [
                'status' => true,
                'data' => [
                    'err' => null
                ]
            ];


            return responseJson( $this->data,  $this->responseMessage );
        }

}
