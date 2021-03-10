<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    public function getListCustomer(){
        $data['users']=User::where('level','3')->paginate(5);
        return view('backend.customer.listcustomer',$data);
    }
}
