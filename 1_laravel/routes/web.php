<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerController;
use Symfony\Component\HttpFoundation\Request;


Route::get('/', function () {
    // return view('welcome');
    return view('home');
    // return "WElcome from laaravel";
});
Route::get('/home', function () {
    return view('home',[ "name"=> "<h3>code lab</h3>", "leture"=> "Laravel"]);
   // return "Home Page  ";
});

// processing function
// Route::get('/about', function () {
//     $num1= 10;
//     $num2= 20;
//     $result =$num1 + $num2;
//     return view('about',['message'=> "This is a about page testing","result" => $result]);
// });


// Route::view('URI','View',"Parameter")
Route::view('/about', 'about',[ "nameEmpty"=> null,"name" =>"code lab", 'message'=> "This is a about page testing","fruits" =>  ['apple','banana',"orange","watermelon"] ]);

// Route::view ('/service',"service");
// Route::view ('/service',"service")->name("ser");
Route::view ('/service',"service",["num1" => 10 ,"num2"=> 20])->name("ser");





Route::get('/contact', function () {
    return view('contact');
});

// folder (customer)
Route::get('/customer/list/male', function () {
    return view('customer.vip_customer.male.list');
});
Route::get('/customer/list/female', function () {
    return view('customer.vip_customer.female.list');
});
// Route::get('/customer/{name}/register/{age}', function ($name,$age) {

//     return "Customer  =  ".$name." and his age is ".$age;
// });
// Route::get('/customer/{name?}/{age?}', function ($name="Pao Pao",$age="30") {

//     return "Customer  =  ".$name." and his age is ".$age;
// });

// function sum($num1,$num2){
//     return $num1;
// }
// sum(1,2);

Route::get('resultPage/{num1}/{num2}',function($num1,$num2){
    return view("result",['result'=> $num1+$num2]);
})->name("res");


Route::get('paraPass/{name?}',function ($name = "anonimyous"){
    // return view("result",["name"=> $name]);
    return $name;
})->name("passWithPara")
;

Route::get('/sum/{num1}/{num2}',function($num1,$num2){
    return $num1+$num2;
})
;

// fnum
Route::get('/addfn/{num1}/{num2}',fn($num1,$num2)=> $num1+$num2);

Route::get('/mutifn/{num1}/{num2}',fn($num1,$num2)=> $num1*$num2);

Route::get('/getData',function (){
    // echo "<pre>";
    $data =file_get_contents ('https://fakestoreapi.com/products');
    $jsonData =json_decode($data);
    // return $data;
    //dd is show with array type
    // dd($jsonData[0]->price);

    // $array['name']
    // obj->name;
    $dataFilter = array_filter($jsonData,fn($jd)=> $jd->price   <50 );
    dd($dataFilter);
})
;

Route::get('laravel',function(){
    // $data = Http::get('https://fakestoreapi.com/products')->object();
    $data = Http::get('https://fakestoreapi.com/products');
    $jsonData = $data->json();
    $objData = $data->object();
    dd($jsonData[1]['price']);
    dd($objData[1]->price);
})
;
Route::get('collect',function(){
     $data = Http::get('https://fakestoreapi.com/products')->object();
    // $collectData = collect($data)->where('price','<',10)->toArray();
     $collectData = collect($data)->whereIn('price',[109,168])->toArray();
    // $collectData = collect($data)->last();
    // $collectData = collect([1,4,5,78,9,9,20])->max();

    dd($collectData);

    // foreach($collectData as $c){
    //     echo $c->title;
    // }
})
;

Route::view('customer/register/page ','customer_register');

//in php
// Route::post('postMethod/',function(){
//     // return "This is post method";
//     return $_POST['userName'];
//     // return "My  name is ".$name." and Your age is".$age;
// })
// ;

// Route::post('postMethod/{id?}',function(Request $req,$id){
//     // dd($req->all());
//     $userData =[
//         'id' =>$id,
//         'name' =>$req->userName,
//         'age' =>$req->userAge,
//         'address'=>$req->userAddress,
//         'gender' => $req -> userGender
//     ];
//     // dd($req->all(),$userData);
//     dd($userData);
// })
// ;

// Route::post('postMethod/{id?}',[AdminController::class,'adminControllerTest']);


// Route::get('controller',[CustomerController::class , 'outputHello']);

// Route::get('compact/list',[CustomerController::class,'compactList']);

//customer
Route::get("customer/home",[CustomerController::class,'home'])->name('customer#home');
Route::post("customer/insert",[CustomerController::class,'insert'])->name('customer#insert');
Route::get("customer/read",[CustomerController::class,'read'])->name('customer#read');

//
