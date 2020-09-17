<?php

function ReferPorcentageCalculation ( $referTotal ) {

    $porcentage = 0;

    switch( $referTotal ) {
    
     case $referTotal  <= 2 :
         return $porcentage = "3%";
         break;     
          
     case $referTotal <= 4:
        
        return $porcentage = "5%";
         break;  

     case $referTotal  <= 6:
        
        return $porcentage = "7%";
         break;  
         
     case  $referTotal >= 7 :
        
         return $porcentage = "10%";
         break;

    default :     
    return $porcentage = 0;     
}

}


