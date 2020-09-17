<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataAccessController extends Controller
{
    private $message;

    public function open() 
    {
        $this->message = Config::get('constants.messages.open_request');
        return response()->json(compact('message'),200);

    } 

    public function closed() 
    {
        $this->message = Config::get('constants.messages.closed_request');
        return response()->json(compact('message'),200);
    }
} 
