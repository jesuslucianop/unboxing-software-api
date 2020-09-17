<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use JWTAuth;
class EmailController extends Controller
{
      private $user_token;
    public function __construct()
    {
  $this->user_token = JWTAuth::toUser(JWTAuth::getToken());
    }
   public function sendEmail($mesaggebody,$subject,$destiny)
   {
   Mail::send([], [], function ($message) {
  $message->to($destiny)
  ->subject($subject)
  ->setBody($mesaggebody); // assuming text/plain->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
});
   }
}
