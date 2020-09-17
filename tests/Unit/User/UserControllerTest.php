<?php
namespace Tests\Unit\User;

use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_can_authenticate() {
        
        //Creating test user
        User::create([
            'name' => 'test',
            'lastName' => 'test',
            'email'=>'test@gmail.com',
            'password' => bcrypt('abcd1234'),
            'identification' => '000-0000000-0',
            'address' => 'Calle #0, Edif #0',
            'phone' => '000-000-0000',
        ]);
        
        $data = [
            'email' => "test@gmail.com",
            'password' => "abcd1234", 
        ];  
         
        $response = $this->postJson('api/login', $data);  
                
        //if assert is true and token was recived
        $response->assertStatus(200);
        $this->assertArrayHasKey('token', $response->json(['data']));

        //Delete the user
        User::where('email','test@gmail.com')->delete();

    }

    public function test_user_can_register() {

        //Creating user 
        $data = [
            'name' => 'test',
            'lastName' => 'test',
            'email'=>'test@gmail.com',
            'password' => bcrypt('test'),
            'identification' => '000-0000000-0',
            'address' => 'Calle #0, Edif #0',
            'phone' => '000-000-0000',
        ];
        


        $response = $this->postJson('/api/register', $data);
        
        // assert if user was created
        $response->assertStatus(200);

        //Delete the user
        User::where('email','test@gmail.com')->delete();

    }

    public function test_can_retrive_user_details() {

        //Creating test user
        User::create([
            'name' => 'test',
            'lastName' => 'test',
            'email'=>'test@gmail.com',
            'password' => bcrypt('abcd1234'),
            'identification' => '000-0000000-0',
            'address' => 'Calle #0, Edif #0',
            'phone' => '000-000-0000',
        ]);
        
        $data = [
            'email' => "test@gmail.com",
            'password' => "abcd1234", 
        ];  
         
        //loggin into user
        $responseLogin = $this->postJson('api/login', $data);  

        //assert if has token
        $this->assertArrayHasKey('token', $responseLogin->json(['data']));    
             
        // Get the token
        $data = json_decode($responseLogin->getContent(), true);

        $dataAuth = [
            'token' => $data['data']['token']
        ]; 

        //retriving user info
        $responseUserDetails = $this->postJson('api/getAuthenticatedUser', $dataAuth);

        // assert if user was retrieved
        $responseUserDetails->assertStatus(200);
   

    }
    
 
    public function test_user_can_logout() {

        //Creating test user
        User::create([
            'name' => 'test',
            'lastName' => 'test',
            'email'=>'test@gmail.com',
            'password' => bcrypt('abcd1234'),
            'identification' => '000-0000000-0',
            'address' => 'Calle #0, Edif #0',
            'phone' => '000-000-0000',
        ]);
        
        $data = [
            'email' => "test@gmail.com",
            'password' => "abcd1234", 
        ];  
         
        //loggin into user
        $responseLogin = $this->postJson('api/login', $data);  

        //assert if has token
        $this->assertArrayHasKey('token', $responseLogin->json(['data']));    
             
        // Get the token
        $data = json_decode($responseLogin->getContent(), true);

        $dataAuth = [
            'token' => $data['data']['token']
        ]; 

        //retriving user info
        $responseUserDetails = $this->postJson('api/logout', $dataAuth);

        // assert if user was retrieved
        $responseUserDetails->assertStatus(200);
   

}
}