<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Functional\Interfaces\ICrud;
use Tymon\JWTAuth\Exceptions\JWTException;
use Config;
use App\User;
 use JWTAuth;
use App\Http\Controllers\UserController;
class serviceController extends Controller
{
    private $reques;
    private $it;
    private $user_token;
    public function __construct( request $n)
    {
     //$this->user_token = JWTAuth::toUser(JWTAuth::getToken());
        $this->reques = $n;
    }
      Public Function create()
   {



        $data = $this->reques->all();
        service::create($data);
        return $data;



   }


     public function update($idservice)
   {

       $service = service::where('idService',$idservice);
$name = $this->reques->name;
$description =$this->reques->description;
$idStatus = $this->reques->idStatus;

    $service->update([
             'name' => $name,
             'description' => $description,
             'idStatus' => $idStatus
        ]);
          return Config::get('constants.messages.Update_exit').$idservice;


        }
   public function getAll(request $request)
   {
    //return $request->all();
    return service::all();
   }


   public function delete($idservice)
   {
        $service = DB::table('service')->where('idService',$idservice);
        if($service){
            $service->delete();
        }
          return Config::get('constants.messages.Deleted_exit');
   }
}
