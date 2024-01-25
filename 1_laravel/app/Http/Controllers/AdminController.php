<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function adminControllerTest(Request $req,$id){
        $userData =[
            'id' =>$id,
            'name' =>$req->userName,
            'age' =>$req->userAge,
            'address'=>$req->userAddress,
            'gender' => $req -> userGender
        ];
        dd($userData);
    }
}
