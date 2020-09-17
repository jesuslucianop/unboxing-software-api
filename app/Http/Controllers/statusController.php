<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Functional\Interfaces\ICrud;
use App\Status;
use Config;
use JWTAuth;
class statusController extends Controller implements ICrud
{
       private $reques;
         private $user_token;
    public function __construct( request $n)
    {
      //  $this->user_token = JWTAuth::toUser(JWTAuth::getToken());
        $this->reques = $n;
    }
      Public Function create()
   {
        $data = $this->reques->all();
        Status::create($data);
        return $data;

   }


     public function update($idStatus)
   {
       $service = Status::where('idStatus',$idStatus);
$name = $this->reques->name;
$active =$this->reques->active;
$idStatus = $this->reques->idStatus;

    $service->update([
             'name' => $name,
             'active' => $active

        ]);
              return Config::get('constants.messages.Update_exit').$idStatus;
   }

    public function delete($idStatus)
   {
        $service = DB::table('status')->where('idStatus',$idStatus);
        if($service){
            $service->delete();
        }
           return Config::get('constants.messages.Deleted_exit');
   }
public  function Getall()
   {
    return Status::all();
   }

}
