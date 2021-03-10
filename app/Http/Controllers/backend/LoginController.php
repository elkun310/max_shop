<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login.login');
    }
    public function postLogin(LoginRequest $r){
        $email=$r->email;
        $password=$r->password;
        if(Auth::attempt(['email' => $email,'password' => $password],$r->has('remember'))){
            if(Auth::user()->level==3){
                Auth::logout();
                return redirect('/login')->withInput()->withErrors(['email'=>'Tài khoản không chính xác']);
            }
            else{
                return redirect('/admin');
            }
        }
        else{
            return redirect('login')->withInput()->withErrors(['email'=>'Sai email hoặc mật khẩu']);
        }
    }
}
