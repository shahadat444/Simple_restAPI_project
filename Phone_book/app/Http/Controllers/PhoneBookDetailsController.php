<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\phone_book_details;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;




class PhoneBookDetailsController extends Controller
{
    public function onSelect(Request $request){
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];
        $result = phone_book_details::where('username',$user)->get();

        return response()->json($result);



    }

    public function onInsert(Request $request){
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];
        $Name = $request->input('name');
        $Email = $request->input('email');
        $Number1 = $request->input('Phone_number1');
        $Number2 = $request->input('Phone_number2');
        $DataInsert =phone_book_details::insert([
            'username'=>$user,
            'name'=>$Name,
            'email'=>$Email,
            'Phone_number1'=>$Number1 ,
            'Phone_number2'=>$Number2

        ]);
        if($DataInsert==true){
            return 'Successfully Inserted';

        }
        else{
            return ' Insert fail';

        }
    }

    public function onDeletet(Request $request){
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];
        $Email = $request->input('email');
        $result = phone_book_details::where(['username'=>$user,'email'=>$Email])->delete();
             if ($result==true) {
                return "Data Delete Successfull";
            }
            else{
                return "Couldn't Delete Try agine";

            }

    }



}
