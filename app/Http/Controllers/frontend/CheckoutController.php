<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Cart;
use App\models\{customer,order,attr};
use Mail;
use App\Events\OrderPusherEvent;
use App\nganluong\lib\NL_Checkout;

class CheckoutController extends Controller
{
    function getCheckout(){
        
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,"",",");
        return view('frontend.checkout.checkout',$data);
    }
    function postCheckout(CheckoutRequest $r){
        // dd($r->checkout_price);die;
        if($r->checkout_type=="1"){
            $customer = new customer;
            $customer->full_name=$r->full;
            $customer->address=$r->address;
            $customer->email=$r->email;
            $customer->phone=$r->phone;
            $customer->total=Cart::total(0,"","");
            $customer->state=0;
            $customer->save();
            event(new OrderPusherEvent($r));
            foreach (Cart::content() as $product) {
                $order = new order;
                $order->name= $product->name;
                $order->price=$product->price;
                $order->quantity=$product->qty;
                $order->img=$product->options->img;
                $order->customer_id=$customer->id;
                $order->save();
                foreach ($product->options->attr as $key => $value) {
                    $attr= new attr;
                    $attr->name=$key;
                    $attr->value=$value;
                    $attr->order_id=$order->id;
                    $attr->save();
                }     
            }
            $data=[
                'title' => 'Maxshop notification',
                'email' => $r->email,
                'full' => $r->full,
                'phone' => $r->phone,
                'address' => $r->address,
                'total' => Cart::total(0,"",","),
                'content' => Cart::content()
            ];
            Mail::send('frontend.mail.email', $data, function ($message) use ($data){
                $message->from('nguyenha9772@gmail.com', 'MaxShop');
                $message->to($data['email'], $data['full']);
                $message->subject('Gửi thông tin giỏ hàng từ cửa hàng MaxShop');

            });
        
            Cart::destroy();
            return redirect('checkout/complete/'.$customer->id);
        }
        else if($r->checkout_type=="2"){
            include(app_path().'\nganluong\config.php');
            include(app_path().'\nganluong\lib\NL_Checkout.php');
            $receiver=RECEIVER;
            //Mã đơn hàng 
            $order_code='NL_'.time();
            //Khai báo url trả về 
            $return_url= $_SERVER['HTTP_REFERER']. "/success.php";
            // Link nut hủy đơn hàng
            $cancel_url= $_SERVER['HTTP_REFERER'];	
            $notify_url = $_SERVER['HTTP_REFERER']. "/success.php";
            //Giá của cả giỏ hàng 
            $txt_name =$r->full; 	
            $txt_email =$r->email; 	
            $txt_phone =$r->phone; 	
            $txt_address =$r->address; 	
            $price =$r->checkout_price; 	
            //Thông tin giao dịch
            $transaction_info="Thong tin giao dich";
            $currency= "vnd";
            $quantity=$r->checkout_qty;
            $tax=0;
            $discount=0;
            $fee_cal=0;
            $fee_shipping=0;
            $order_description="Thong tin don hang: ".$order_code;
            $buyer_info=$txt_name."*|*".$txt_email."*|*".$txt_phone."*|*".$txt_address;
            $affiliate_code="";
            //Khai báo đối tượng của lớp NL_Checkout
            $nl=  new NL_Checkout();
            // echo hello();
            // var_dump($nl);
            $nl->nganluong_url = NGANLUONG_URL;
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            //Tạo link thanh toán đến nganluong.vn
            $url= $nl->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,$fee_shipping, $order_description, $buyer_info , $affiliate_code);
            //$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
            
            
            //echo $url; die;
            if ($order_code != "") {
                //một số tham số lưu ý
                //&cancel_url=http://yourdomain.com --> Link bấm nút hủy giao dịch
                //&option_payment=bank_online --> Mặc định forcus vào phương thức Ngân Hàng
                $url .='&cancel_url='. $cancel_url . '&notify_url='.$notify_url;
                // $url .='&option_payment=bank_online';
                
                echo '<meta http-equiv="refresh" content="0; url='.$url.'" >';
                //&lang=en --> Ngôn ngữ hiển thị google translate
            }
            // return view('frontend.checkout.nganluong');
        }
        
        
        
    }
    function getComplete($customer_id){
        $data['customer'] = customer::find($customer_id);
        return view('frontend.checkout.complete',$data);
    }
}
