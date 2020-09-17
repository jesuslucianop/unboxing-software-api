<?php 
function responseJson( $data = NULL,  $message = []){
    return response()->json( $data , $message['status'] );

}
?>