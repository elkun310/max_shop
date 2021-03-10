<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\carbon;
use App\models\{customer,product};
use App\User;

class IndexController extends Controller
{
    public function getIndex(){
        //dd(carbon::now()->format('d-m-Y'));
        $month_now=carbon::now()->format('m');
        $year_now=carbon::now()->format('Y');
        for ($i=1; $i<= $month_now; $i++) {
            $dl['Tháng '.$i]=customer::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_now)->sum('total');
        }
        $data['user']=User::whereIn('level',array(1, 2))->count();
        $data['product']=product::count();
        $data['dl']=$dl;
       
        // foreach ($dl as $key => $value) {
        //     echo number_format($value,0,"",",")."<br>";
        // }
        // die;
        
        $data['unprocess']=customer::where('state','0')->count();
        return view('backend.index',$data);
    }
    function LogOut(){
        Auth::logout();
        return redirect('login');
    }   
}
