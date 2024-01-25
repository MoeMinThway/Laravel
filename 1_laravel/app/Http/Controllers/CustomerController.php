<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    //customer home page
    public function home(){
        return view('customer_page.insert');
    }
    //customer inset data(MVC)

    public function insert(Request $req){
        dd(Carbon::now());
        //first way
        $data =[
            'name'=>$req-> customerName,
            'address'=>$req-> customerAddress,
            'phone'=>$req-> customerPhone,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];
        Customer::create($data);

        $record =new Customer();
        $record->name =$req->customerName;
        $record->address =$req->customerAddress;
        $record->phone =$req->customerPhone;
        $record->create_at =Carbon::now();
        $record->update_at =Carbon::now();
        $record ->save();
        return "Create Success";
    }
    //get data
    public function read(){
        $data = new Customer();
        //  $a =$data->find(2)->toArray();
        $a =$data->findOrFail(2)->toArray();
        // dd(Customer::find(1)->toArray());
        dd(Customer::where("phone",'1231')->get()->toArray());
        // dd($a);
    }
}
25
