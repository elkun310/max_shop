<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EditAccountRequest;
class AccountController extends Controller
{
    function detailAccount($idAccount){
        $data['account'] = User::find($idAccount);
        return view('frontend.account.info',$data);
    }
    function editAccount($idAccount,EditAccountRequest $r){
        $account = User::find($idAccount);
        $account->full=$r->full;
        $account->email=$r->email;
        if($r->password!="")
        {
            $account->password = bcrypt($r->password);
        }
        $account->address = $r->address;
        $account->phone=$r->phone;
        $account->level = 3;
        $account->save();
        $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
