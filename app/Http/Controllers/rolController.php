<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Functional\Interfaces\ICrud;
use Illuminate\Support\Facades\DB;
use Config;
 use JWTAuth;
class rolController extends Controller implements ICrud
{


    private $reques;
    private $user_token;
    public function __construct( request $n)
    {
       // $this->user_token = JWTAuth::toUser(JWTAuth::getToken());
        $this->reques = $n;
    }
   Public Function create()
   {
        $data = $this->reques ->all();
        Rol::create($data);
        return $data;

   }
   public function getall()
   {
    return Rol::all();
   }


   public function delete($idRol)
   {
        $rol = DB::table('rol')->where('idRol',$idRol);
        if($rol){
            $rol->delete();
        }
     return Config::get('constants.messages.Deleted_exit');
   }

     public function update($idRol)
   {
       $rol = rol::where('idRol',$idRol);
$name = $this->reques->name;
$description = $this->reques->description;
$idStatus = $this->reques->idStatus;

    $rol->update([
             'name' => $name,
             'description' => $description,
             'idStatus' => $idStatus
        ]);
       return Config::get('constants.messages.Update_exit').$idRol;
   }
}
