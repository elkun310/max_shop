<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,category,attribute,values};
use App\Http\Requests\{SignUpRequest,SignInRequest};
use App\User;
use Mail;
use Cart;

class IndexController extends Controller
{
    function getIndex(){
        $data['featured_prds']=product::where('featured','1')->where('state','1')->where('display','1')->where('img','<>','no-img.jpg')->take(4)->get();
        $data['new_prds']=product::orderBy('created_at','desc')->where('state','1')->where('display','1')->where('img','<>','no-img.jpg')->take(8)->get();
        return view('frontend.index',$data);
    }
    function getAbout(){
        return view('frontend.about');
    }
    function getContact(){
        return view('frontend.contact');
    }
    function subcribe(Request $r){
        $data['mail']=$r->email;
        $data['cart']="subcribe from maxshop";
        Mail::send('frontend.mail.design-mail', $data, function ($message) use ($data) {
            $message->from('nguyenha9772@gmail.com', 'MaxShop');
            $message->to($data['mail'], 'aaa');
            $message->subject('Maxshop thông báo');
        });
        return view('frontend.mail.design-mail',$data);
    }
    function searchProduct(Request $r){
        // dd($r->keyword);
        $result = $r->keyword;
        $new_keyword=str_replace(' ','%',$result);
        $data['attrs']=attribute::all();
        $data['categories']=category::all();
        $data['keyword']=$result;
        if($r->value){
            
            $data['products']=values::find($r->value)->product()->where('name','like','%'.$new_keyword.'%')->where('state','1')->where('display','1')->where('img','<>','no-img.jpg')->paginate(12);
        }
        else if($r->start!=0)
        {   
            $data['products'] = product::where('name','like','%'.$new_keyword.'%')->whereBetween('price', [$r->start, $r->end])->where('state','1')->where('display','1')->where('img','<>','no-img.jpg')->paginate(12);
        }
        else{
            $data['products'] = product::where('name','like','%'.$new_keyword.'%')->where('state','1')->where('display','1')->where('img','<>','no-img.jpg')->paginate(12);
        }
        
        return view('frontend.search',$data);
    }

    public function signUp(SignUpRequest $r){
        $user = new User;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone=$r->phone;
        $user->level = '3';
        $user->save();
        $notification = array(
            'message' => 'Đăng ký thành công',
            'alert-type' => 'success'
        );
        // return redirect('')->with($notification);
        return redirect()->back()->with($notification);
    }
    public function signIn(SignInRequest $r){
        $email=$r->email2;
        $password=$r->password2;
        if(Auth::attempt(['email' => $email,'password' => $password])){
            if(Auth::user()->level==3){
                $notification = array(
                    'message' => 'Đăng nhập thành công',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
                // return redirect('')->with($notification);
            }
            else if(Auth::user()->level!=3){
                Auth::logout();
                $notification = array(
                    'message' => 'Tài khoản không chính xác',
                    'alert-type' => 'danger'
                );
                // return redirect('')->with($notification); 
                return redirect()->back()->with($notification);
            }
            
        }
        else if(Auth::attempt(['phone' => $email,'password' => $password])){
            if(Auth::user()->level==3){
                $notification = array(
                    'message' => 'Đăng nhập thành công',
                    'alert-type' => 'success'
                );
                // return redirect('')->with($notification);
                return redirect()->back()->with($notification);
            }
            else if(Auth::user()->level!=3){
                Auth::logout();
                $notification = array(
                    'message' => 'Tài khoản không chính xác',
                    'alert-type' => 'danger'
                );
                // return redirect('')->with($notification); 
                return redirect()->back()->with($notification);
            }
        }
        else{
            $notification = array(
                'message' => 'Tài khoản không chính xác',
                'alert-type' => 'danger'
            );
            // return redirect('')->with($notification);
            return redirect()->back()->with($notification);
        }
    }
    public function logOut(){
        Cart::destroy();
        // if(Auth::user()->level==3)
        // {
        //     Auth::logout();
        // }
        Auth::logout();
        $notification = array(
            'message' => 'Đăng xuất thành công',
            'alert-type' => 'success'
        );
        return redirect('')->with($notification);
    }
}
