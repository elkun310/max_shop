<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{customer,order,attr};
use DB;
use Excel;
use PDF;
use Carbon\carbon;
use App\Http\Requests\SortOrderByDate;
use Auth;
class OrderController extends Controller
{
    function getOrder(){
        $data['customers'] = customer::where('state',0)->orderBy('created_at','desc')->paginate(6);
        $data['count']=customer::where('state',0)->count();
        return view('backend.order.order',$data);
    }
    function getDetailOrder($idCustomer){
        $data['i']=1;
        $data['customer']=customer::find($idCustomer);
        return view('backend.order.detailorder',$data);
    }
    function getProcessed(){
        $data['customers']=customer::where('state','1')->orderBy('updated_at','desc')->paginate(6);
        $data['count']=customer::where('state','1')->count();
        return view('backend.order.orderprocessed',$data);
    }
    public function Processing($idCustomer){
        // dd(Auth::user()->full);die;
        $customer = customer::find($idCustomer);
        $customer->state= 1;
        $customer->staff=Auth::user()->full;
        $customer->save();
        return redirect('/admin/order/processed')->with('thongbao','Xử lý đơn hàng thành công');
    }
    public function deleteOrder(Request $r,$idCustomer){
        // dd($r->all());die;
        $customer = customer::find($idCustomer);
        $customer->state="2";
        $customer->reason=$r->reason;
        $customer->staff=Auth::user()->full;
        $customer->save();
        return redirect('/admin/order/cancel')->with('thongbao','Đơn hàng đã được hủy thành công');
    }
    public function cancelOrder(){
        $data['customers']=customer::where('state','2')->orderBy('updated_at','desc')->paginate(5);
        $data['count']=customer::where('state','2')->count();
        return view('backend.order.cancel',$data);
    }
    public function printOrder($idCustomer){
        $data['customer']=customer::find($idCustomer);
        //dd($data['order']);
        $data['count']=customer::find($idCustomer)->order()->count();
        return view('backend.order.orderprint',$data);
    }
    public function exportExcel(){
        $order_data=customer::select('id','full_name','address','email','phone','total','updated_at')->where('state','1')->get();
        $order_array[]=array('Mã đơn hàng','Tên khách hàng','Địa chỉ','Email','Số điện thoại','Tổng tiền','Ngày thanh toán');
        foreach ($order_data as $customer) {
            // dd($order->id);
            $order_array[] = array(
                'Mã đơn hàng' => '#'.$customer->id,
                'Tên khách hàng' => $customer->full_name,
                'Địa chỉ' => $customer->address,
                'Email' => $customer->email,
                'Số điện thoại' => $customer->phone,
                'Tổng tiền' => number_format($customer->total,0,"",",")." VNĐ",
                'Ngày thanh toán' => $customer->updated_at

                
            );
        }
        $data = customer::get()->toArray();
        Excel::create('Order Data', function($excel) use ($order_array){
            $excel->setTitle('Order Data');
            $excel->sheet('Order Data', function($sheet) use ($order_array){
             $sheet->fromArray($order_array, null, 'A1', false, false);
            });
           })->download('xlsx');
    }

    //export pdf
    public function get_order_data(){
        $order_data=customer::select('id','full_name','address','email','phone','total','updated_at')->get();
        return $order_data;
    }
    public function pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_order_data_to_html(),'HTML-ENTITIES', 'UTF-8')->setPaper('a4', 'landscape');
        return $pdf->stream('Dữ liệu đơn hàng.pdf');
    }
    function convert_order_data_to_html(){
        $order_data=$this->get_order_data();
        $output='<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
              body { font-family: DejaVu Sans, sans-serif; }
            </style>
            <h1 style="text-align:center">Danh sách đơn đặt hàng đã xử lý</h1>
            <table class="table table-bordered" style="margin-top:20px;">               
                <thead>
                    <tr class="bg-primary">
                        <th style="border:1px solid">Mã Đơn Hàng</th>
                        <th style="border:1px solid">Tên khách hàng</th>
                        <th style="border:1px solid">Email</th>
                        <th style="border:1px solid">Số điện thoại</th>
                        <th style="border:1px solid">Địa chỉ</th>
                        <th style="border:1px solid">Tổng tiền</th>
                        <th style="border:1px solid">Thời gian</th>
                </tr>
                </thead>
        ';
        foreach ($order_data as $row) {
            $output.='
                <tbody>
                    <tr>
                        <td style="border:1px solid; padding:12px;">#'.$row->id.'</td>
                        <td style="border:1px solid; padding:12px;" width="20%"">'.$row->full_name.'</td>
                        <td style="border:1px solid; padding:12px;">'.$row->email.'</td>
                        <td style="border:1px solid; padding:12px;">'.$row->phone.'</td>
                        <td style="border:1px solid; padding:12px;">'.$row->address.'</td>
                        <td style="border:1px solid; padding:12px;">'.number_format($row->total,0,"",",").' VNĐ</td>
                        <td style="border:1px solid; padding:12px;" width="15%">'.Carbon::parse($row->updated_at)->format('d-m-Y').'</td>                                                                                
                    </tr>
                </tbody>
            ';
            

        }
        $output.='</table>';
        return $output;
    }
    

    //sort order by date 
    public function sortDate(SortOrderByDate $r){
        $order_from_date = $r->order_from_date;
        $order_to_date   = $r->order_to_date;
        if($order_from_date=="" && $order_to_date==""){
            $data['customers'] = customer::where('state',0)->orderBy('created_at','desc')->paginate(6);
            $data['count']=customer::where('state',0)->count();
            return view('backend.order.order',$data);
        }else if($order_from_date!="" && $order_to_date!=""){
            $data['customers']=customer::whereBetween('created_at', array($order_from_date, $order_to_date))
            ->where('state','0')
            ->orderBy('created_at','asc')->paginate(5);
            $data['count']=customer::whereBetween('created_at', array($order_from_date, $order_to_date))
            ->where('state','0')->count();
            return view('backend.order.order',$data);
        }
        
    }
    //end sort order by date

    //sort Processed Order by Date
    public function sortProcessedByDate(SortOrderByDate $r){
        $order_from_date = $r->order_from_date;
        $order_to_date   = $r->order_to_date;
        if($order_from_date=="" && $order_to_date==""){
            $data['customers'] = customer::where('state',1)->orderBy('created_at','desc')->paginate(6);
            $data['count']=customer::where('state',1)->count();
            return view('backend.order.orderprocessed',$data);
        }else if($order_from_date!="" && $order_to_date!=""){
            $order_from_date = $r->order_from_date;
            $order_to_date   = $r->order_to_date;
            $data['customers']=customer::whereBetween('created_at', array($order_from_date, $order_to_date))
            ->where('state','1')
            ->orderBy('created_at','desc')->paginate(5);
            $data['count']=customer::whereBetween('created_at', array($order_from_date, $order_to_date))
            ->where('state','1')->count();
            return view('backend.order.orderprocessed',$data);
        }
    }
    //end sort Processed Order by Date



}
