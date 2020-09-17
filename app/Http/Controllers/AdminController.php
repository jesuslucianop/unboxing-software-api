<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rol;
use App\User;
use JWTAuth;
use Config;
class AdminController extends Controller
{
    private $request;
    private $user_token;
    public function __construct(request $request)
    {
        $this->request = $request;
         $this->user_token = JWTAuth::toUser(JWTAuth::getToken());
    }
    public Function getAllUserSystem()
    {
        $roluser = $this->user_token->idRol;
        if($roluser != null){
       $rol = Rol::where('idRol', '=', $roluser)->firstOrFail();
       return $roluser;
        }
        return User::all();
        


       // return !$rol ? json_encode("NO tiene rol") : json_encode($rol)->name;
    }
        public function updateStatus($id)
   {
          $roluser = $this->user_token->idRol;
        $rol = Rol::where('idRol', '=', $roluser)->firstOrFail();
        $namerol = $rol->name;
        if($namerol == 'admin'){
        $user = User::where('idUser',$id);
        $idStatus = $this->request->idStatus;
        $user->update(['idStatus' => $idStatus ]);
       return Config::get('constants.messages.Update_exit').$id;
        }
        return "No se pudo actualizar";
    }

    public function updatepercent($id)
    {
         $roluser = $this->user_token->idRol;
        $rol = Rol::where('idRol', '=', $roluser)->firstOrFail();
        $namerol = $rol->name;
        if($namerol == 'admin'){
       $user = User::where('idUser',$id);

    $percent = $this->request->percent;

    $user->update([
             'percent' => $percent
        ]);
       return Config::get('constants.messages.Update_exit').$id;
   }
    return "No se pudo actualizar";
    }
     public function updateUser($id)
    {
         $roluser = $this->user_token->idRol;
        $rol = Rol::where('idRol', '=', $roluser)->firstOrFail();
        $namerol = $rol->name;
        if($namerol == 'admin'){
       $user = User::where('idUser',$id);

    $name = $this->request->name;
    $lastName = $this->request->lastName;
    $phone = $this->request->phone;
    $address = $this->request->address;
    $email = $this->request->email;
    $notification = $this->request->notification;
    $percent = $this->request->percent;
    $identification = $this->request->identification;
    $password = $this->request->password;

    $user->update([
          'name'=> $name,
          'lastName'=> $lastName,
        'phone'=> $phone,
         'address'=> $address,
         'email'=> $email,
        'notification'=> $notification,
        'percent' => $percent,
        'identification'=> $identification


        ]);
       return Config::get('constants.messages.Update_exit').$id;
   }

    }
}
