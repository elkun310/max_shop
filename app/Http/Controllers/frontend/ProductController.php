<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,category,attribute,values,comment};
use App\Http\Requests\CommentRequest;
use App\Events\HelloPusherEvent;
use Auth;

class ProductController extends Controller
{
    function getShop(Request $r){
        if($r->value){
            
            $data['products']=values::find($r->value)->product()->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->paginate(12);
        }
        else if($r->start!=0)
        {
            $data['products']=product::whereBetween('price', [$r->start, $r->end])->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->paginate(12);
        }
        else{
            $data['products']=product::where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->orderBy('created_at','desc')->paginate(12);
        }
        $data['attrs']=attribute::all();
        $data['categories']=category::all();
        return view('frontend.product.shop',$data);
       
    }
    // public function contentLoad(Request $r){
    //     if($r->value){ 
    //         $data['products']=values::find($r->value)->product()->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->paginate(12);
    //     }
    //     else if($r->start!=0)
    //     {
    //         $data['products']=product::whereBetween('price', [$r->start, $r->end])->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->paginate(12);
    //     }
    //     else{
    //         $data['products']=product::where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->orderBy('created_at','desc')->paginate(12);
    //         //$data['products']=product::whereBetween('price', [$r->start, $r->end])->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->paginate(12);
    //     }
    //     return view('frontend.product.ajax-shop',$data);
    // }
    public function searchAjaxProduct(Request $r){
        $prdname= $r->prdname;
        $new_keyword = str_replace(' ','%',$prdname);
        $data['attrs']=attribute::all();
        $data['categories']=category::all();
       
        if($data['products']=product::where('name','like','%'.$new_keyword.'%')->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->count()>=1){
            $data['products']=product::where('name','like','%'.$new_keyword.'%')->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->paginate(8);
            return view('frontend.product.ajax-search',$data);
            
        }else{
            return view('frontend.product.no-ajax-search');
        }
        // if ($r->ajax()) {
        //     //$users = DB::table('users')->where('first_name','LIKE','%'.$request->search."%")->get();
        //     $products=product::where('name','like','%'.$r->search.'%')->where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->get();
        //     return response()->json(['products' => $products], 200);
        // }
    
        // return something_else;
        
    }
    function getDetail($str){
        $array= explode('-',$str);
        //dd($array);
        //echo end($array);

        $id= array_pop($array);
        
        $data['product']=product::find($id);
        $data['new_products']=product::where('img','<>','no-img.jpg')->where('state',1)->where('display',1)->orderBy('created_at','desc')->take(4)->get();
        $data['comments']=product::find($id)->comment()->where('state','1')->paginate(5);
        return view('frontend.product.detail',$data);
        
    }
    public function postComment(CommentRequest $r){
        $comment = new comment;
        $comment->name=$r->name;
        $comment->email=$r->email;
        $comment->content=$r->content;
        $comment->state=0;
        $comment->product_id=$r->id_product;
        $comment->save();
        event(new HelloPusherEvent($r));
        $notification = array(
            'message' => 'Cảm ơn bạn đã bình luận về sản phẩm. Bình luận của bạn sẽ được phê duyệt trước khi được đăng ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        //return redirect()->back()->with('thongbao','Cảm ơn bạn đã bình luận về sản phẩm. Bình luận của bạn sẽ được phê duyệt trước khi được đăng');
        
    }
    //lấy sản phẩm theo danh mục
    public function Getprdcate($slug_cate,Request $r){
        //dd($r->all());
        if($r->start)
        {
            $data['products']=category::where('slug',$slug_cate)->first()->prd()->where('img','<>','no-img')->where('state',1)->where('display',1)->whereBetween('price', [$r->start, $r->end])->paginate(6);  
        }
        else{
            $data['products']=category::where('slug',$slug_cate)->first()->prd()->where('img','<>','no-img')->where('state',1)->where('display',1)->paginate(6);
  
        }
        $data['attrs']=attribute::all();
        $data['categories']=category::all();
        return view('frontend.product.shop',$data);
    }
}
