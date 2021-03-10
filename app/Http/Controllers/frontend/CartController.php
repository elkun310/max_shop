<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,user_cart,detailcart};
use Cart;
use Auth;
class CartController extends Controller
{
    function getCart(){
        //Cart::destroy();
        // $data['user_cart']=user_cart::where('user_id',Auth::user()->id)->get();
        // $data['product']=product::where('id',16)->get();
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0, "", ",");
        //dd(Cart::content());
        return view('frontend.cart.cart',$data);
    }
    public function addCart(Request $r){
        $user_cart = new user_cart;
        $user_cart->user_id=Auth::user()->id;
        $user_cart->save();
        $detail_cart =  new detailcart;
        $detail_cart->cart_id=$user_cart->id;
        $detail_cart->product_id=$r->id_product;
        $detail_cart->quantity=$r->qty;
        $detail_cart->save();



        $product = product::find($r->id_product);
        Cart::add([
            'id' => $product->code,
            'name' => $product->name,
            'qty' => $r->qty,
            'price' => getprice($product,$r->attr),
            'weight' => 0,
            'options' => ['img' => $product->img,'attr' => $r->attr]
            ]);
            return redirect('cart');
    }
    public function removeCart($rowId){
        Cart::remove($rowId);
        return "success";
    }
    public function updateCart($rowId,$qty){
        Cart::update($rowId,$qty);
        return "success";
    }
}
