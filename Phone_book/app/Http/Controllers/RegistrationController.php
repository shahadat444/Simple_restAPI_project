<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function onRegister(Request $request){
       $first_Name = $request->input('first_name');
       $last_Name = $request->input('last_name');
       $userName = $request->input('username');
       $password = $request->input('password');
       $gender = $request->input('gender');
       $country = $request->input('country');
       $Hobbie = $request->input('Hobbie');

       $RegistrationCount = Registration::where('username', $userName)->count();
       if ($RegistrationCount!=0) {
            return 'The user already existed';
        }
        else{
            $Result = Registration::insert([
                'first_name'=>$first_Name,
                'last_name'=>$last_Name,
                'username'=>$userName,
                'password'=>$password,
                'gender'=>$gender,
                'country'=>$country,
                'Hobbie'=>$Hobbie,
            ]);

            if ($Result==true) {
            return 'Registration successful';
            }
            else{
            return 'Registration fail try again';

            }
       }
    }
}
