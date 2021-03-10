<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{AddUserRequest,EditUserRequest};
use App\User;

class UserController extends Controller
{
    function getListUser(){
        $data['users']=User::whereIn('level',array(1, 2))->paginate(5);
        $data['id']=1;
        return view('backend.user.listuser',$data);
    }
    function getAddUser(){
        return view('backend.user.adduser');
    }   
    function postAddUser(AddUserRequest $r){
        $user = new User;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone=$r->phone;
        $user->level = $r->level;
        $user->save();
        $notification = array(
            'message' => 'Đã thêm thành công thành viên '.$r->full,
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
        //return redirect('/admin/user')->with('thongbao','Thêm thành công thành viên '.$r->full);
    }
    function getEditUser($idUser){
        $data['user']= User::find($idUser);
        return view('backend.user.edituser',$data);
    }
    function postEditUser(EditUserRequest $r,$idUser){
        $user = User::find($idUser);
        $user->email=$r->email;
        if($r->password!="")
        {
            $user->password = bcrypt($r->password);
        }
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone=$r->phone;
        $user->level = $r->level;
        $user->save();
        $notification = array(
            'message' => 'Đã sửa thành công thành viên '.$r->full,
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
        //return redirect('/admin/user')->with('thongbao','Sửa thành công thành viên '.$r->full);
    }
    function DeleteUser($idUser){
        User::destroy($idUser);
        $notification = array(
            'message' => 'Đã xóa thành công thành viên',
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
        //return redirect('/admin/user')->with('thongbao','Xóa thành công thành viên');
    }
}
