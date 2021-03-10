<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;

class AjaxController extends Controller
{
    public function showProduct(Request $r){
        $prdid = $r->prdid;
        $data['product']=product::find($prdid);
        return view('backend.product.ajax_showprd',$data);
    }
    public function changeDisplay(Request $r){
        $prdid=$r->prdid;
        $product = product::find($prdid);
        // if($product->display=="1"){
        //     $product->display="0";
        // }else{
        //     $product->display="1";
        // }
        $product->display=="1"?$product->display="0":$product->display="1";
        $product->save();
        // return "success";

        $notification = array(
            'message' => 'Đã thay đổi trạng thái thành công ',
            'type' => 'success'
        );
        return $notification;
    }
    // public function getSearchAjax(Request $request){
        
        
    //         $query = $request->get('query');
    //         $products = product::where('name', 'LIKE', "%{$query}%")
    //         ->paginate(5);

    //         return view('result')->with('members', $products);
           
    // }
}
