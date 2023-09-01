<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Firebase\JWT\JWT;


class loginController extends Controller
{

    public function onLogin(Request $request){
        $userName = $request->input('username');
        $password = $request->input('password');
        $loginCount = Registration::where(['username'=> $userName,'password'=>$password])->count();

        if($loginCount==1){
            $key = env('TOKEN_KEY');
            $payload = [
                'site'=>'http://demo.com',
                'user'=>$userName,
                'iat'=>time(),
                'exp'=>time()+3600
            ];
            $jwt =JWT::encode($payload, $key, 'HS256',);
                return response()->json(['token'=>$jwt,'status'=> "Login successfull"]);
        }
        else{
            return "username or password worng ";



        }






    }
}
