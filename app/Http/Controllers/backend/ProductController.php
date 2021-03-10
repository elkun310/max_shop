<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{AddProductRequest,EditProductRequest,AddAttrRequest,AddValueRequest,EditAttrRequest,EditValueRequest};
use App\models\{product,category,attribute,values,variant,comment};
use Auth;
use App\User;

class ProductController extends Controller
{
    //============================PRODUCT==============================//
    function getListProduct(){
        //dd(attr_values(product::find(8)->values()->get()));
        $data['products']=product::orderBy('id','desc')->paginate(5);
        $data['total_product']=product::count();
        return view('backend.product.listproduct',$data);
    }
    function getAddProduct(){
        $data['categories']=category::all()->toarray();
        $data['attrs']=attribute::all();
        //$data['value']=attribute->values()->all();
        return view('backend.product.addproduct',$data);
    }
    function postAddProduct(AddProductRequest $r){
        // dd($r->all());
        $product = new product;
        $product->code=$r->code;
        $product->name=$r->name;
        $product->slug=str_slug($r->name);
        $product->price=$r->price;
        $product->featured=$r->featured;
        $product->state=$r->state;
        $product->display=$r->display;
        $product->info=$r->info;
        $product->describe=$r->describe;
        //kiểm tra có hành động upload ko
        if($r->hasFile('img'))
        {
            //đường dẫn tương đối của file
            $file=$r->img;
            //lấy tên file
            $file_name=str_slug($r->name).'.'.$file->getClientOriginalExtension();
            //upload file lên serve
            // đường dẫn đứng ở index
            $file->move('backend/img',$file_name);
            $product->img=$file_name;
        }
        else{
            $product->img='no-img.jpg';
        }
        
        $product->category_id=$r->category;
        $product->save();

        //lấy giá trị thuộc tính add vào db
        $mang=array();
        foreach ($r->attr as $value) {
            foreach ($value as $item) {
                $mang[]=$item;
            }
        }
        $product->values()->Attach($mang);
        // //tạm thời ẩn biến thể
        // //tạo biến thể từ các giá trị trên
        // $variant = get_combinations($r->attr);
        // foreach ($variant as $var) {
        //     $vari = new variant;
        //     $vari->product_id=$product->id;
        //     $vari->save();
        //     $vari->values()->Attach($var);
        // }
        //return redirect('/admin/product/add-variant/'.$product->id);
        //return redirect('admin/product')->with('thongbao','Thêm sản phẩm thành công');
        $notification = array(
            'message' => 'Đã thêm thành công sản phẩm '.$r->name,
            'alert-type' => 'success'
        );
        return redirect('admin/product')->with($notification);
    }
    function getEditProduct($idProduct){
        $user=Auth::user();
        if($user->can('edit',User::class))
        {
            // echo "Cho phép thêm";
            $data['categories']=category::all()->toarray();
            $data['product']=product::find($idProduct);
            $data['attrs']=attribute::all();
            return view('backend.product.editproduct',$data);
        }else{
            $notification = array(
                'message' => 'Bạn không có quyền. Hãy liên hệ quản trị viên để được cấp quyền',
                'alert-type' => 'warning'
            );
            return redirect('admin/product')->with($notification);
            //return redirect()->back()->with('thongbao','Bạn không có quyền');
        }
        // $data['categories']=category::all()->toarray();
        // $data['product']=product::find($idProduct);
        // $data['attrs']=attribute::all();
        // return view('backend.product.editproduct',$data);
    }
    function postEditProduct(EditProductRequest $r,$idProduct){   
        $data['categories']=category::all()->toarray();
        $product = product::find($idProduct);
        $product->code = $r->code;
        $product->name=$r->name;
        $product->slug=str_slug($r->name);
        $product->price=$r->price;
        $product->featured=$r->featured;
        $product->state=$r->state;
        $product->display=$r->display;
        $product->info=$r->info;
        $product->describe=$r->describe;
        if($r->hasFile('img')){
            if(file_exists('backend/img'.$product->img))
            {
                if($product->img!="no-img.jpg")
                {
                    unlink('backend/img/'.$product->img);
                }
            }
            $file=$r->img;
            $file_name=str_slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);
            $product->img=$file_name;
        }
        $product->category_id=$r->category;
        $product->save();
         //lấy giá trị thuộc tính add vào db
        $mang=array();
        foreach ($r->attr as $value) {
            foreach ($value as $item) {
                $mang[]=$item;
            }
        }
        $product->values()->Sync($mang);
        
        //tạo biến thể từ các giá trị trên
        $variant = get_combinations($r->attr);
        foreach ($variant as $var) {
           if (check_var($product,$var)) {
            $vari = new variant;
            $vari->product_id=$product->id;
            $vari->save();
            $vari->values()->Attach($var);
           }
        }
        $notification = array(
            'message' => 'Đã sửa thành công sản phẩm '.$r->name,
            'alert-type' => 'success'
        );
        //return redirect('admin/product')->with($notification);
        //return redirect()->back()->with('thongbao','Sửa sản phẩm thành công');
        return redirect()->back()->with($notification);
    }
    function deleteProduct($idProduct){
        $user=Auth::user();
        if($user->can('delete',User::class))
        {
            product::destroy($idProduct);
            return redirect()->back()->with('thongbao','Xoá sản phẩm thành công');
        }
        else{
            $notification = array(
                'message' => 'Bạn không có quyền. Hãy liên hệ quản trị viên để được cấp quyền',
                'alert-type' => 'warning'
            );
            return redirect('admin/product')->with($notification);
        }
        // product::destroy($idProduct);
        // return redirect()->back()->with('thongbao','Xoá sản phẩm thành công');
    }
    public function searchProduct(Request $r){
        $keyword = str_replace(' ','%',$r->product_name);
        $data['products']=product::where('name','like','%'.$keyword.'%')->orderBy('id','desc')->paginate(5);
        $data['total_product']=product::where('name','like','%'.$keyword.'%')->count();
        return view('backend.product.listproduct',$data);
    }
    //============================END PRODUCT=============================//
    //============================ATTRIBUTE==============================//
    function addAttr(AddAttrRequest $r){
        $attr = new attribute;
        $attr->name = $r->attr_name;
        $attr->save();
        return redirect('/admin/product/add')->with('thongbao','Thêm thành công thuộc tính ');
    }
    function detailAttr(){
        $data['attributes']=attribute::all();
        return view('backend.attr.attr',$data);
    }
    function editAttr($idAttr){
        $data['attr']=attribute::find($idAttr);
        return view('backend.attr.editattr',$data);
    }
    function postEditAttr($idAttr,EditAttrRequest $r){
        $attr= attribute::find($idAttr);
        $attr->name=$r->attr_name;
        $attr->save();
        return redirect('/admin/product/detail-attr')->with('thongbao','Sửa thành công thuộc tính '.$r->attr_name);
    }
    function deleteAttr($idAttr){
        attribute::destroy($idAttr);
        return redirect('/admin/product/detail-attr')->with('thongbao','Đã xóa thành công thuộc tính');
    }
    //============================END ATTRIBUTE==============================//

    //============================VALUE OF ATTRIBUTE==============================//
    function addValue(AddValueRequest $r){
        $value= new values;
        $value->value=$r->value_name;
        $value->attr_id=$r->attr_id;
        $value->save();
        return redirect()->back()->with('thongbao','Thêm thành công giá trị: '.$r->value_name);
    }
    function editValue($idValue){
        $data['value']=values::find($idValue);
        return view('backend.attr.editvalue',$data);
    }
    function postEditValue($idValue,EditValueRequest $r){
        $value = values::find($idValue);
        $value->value=$r->value_attr;
        $value->save();
        return redirect('/admin/product/detail-attr')->with('thongbao','Sửa thành công giá trị thuộc tính');
        
    }
    function deleteValue($idValue){
        values::destroy($idValue);
        return redirect()->back()->with('thongbao','Xóa thành công giá trị thuộc tính');
    }
    //============================END VALUE==============================//

    //============================VARIANT==============================//
    function addVariant($idProduct){
        $data['product']=product::find($idProduct);
        return view('backend.variant.addvariant',$data);
    }
    function postAddVariant(Request $r){
        foreach ($r->variant as $key => $value) {
            $vari = variant::find($key);
            $vari->price=$value;
            $vari->save();
        }
        return redirect('/admin/product')->with('thongbao','Đã thêm thành công');
    }
    function editVariant($idProduct){
        $data['product']=product::find($idProduct);
        return view('backend.variant.editvariant',$data);
    }
    function postEditVariant($idProduct,Request $r){
        foreach ($r->variant as $key => $value) {
            $vari = variant::find($key);
            $vari->price=$value;
            $vari->save();
        }
        return redirect('/admin/product')->with('thongbao','Đã sửa thành công');
    }
    function deleteVariant($idVariant){
        variant::destroy($idVariant);
        return redirect()->back()->with('thongbao','Đã xóa biến thể thành công');
    }
    //============================END VARIANT==============================//

    //============================COMMENT==============================//
    function getListComment(){
        $data['i']=1;
        $data['comments']=comment::where('state','0')->orderBy('created_at','desc')->get();
        return view('backend.comment.comment',$data);
    }
    function getEditComment($idComment){
        $data['comment']=comment::find($idComment);
        return view('backend.comment.editcomment',$data);
    }
    function postEditComment($idComment,Request $r){
        $comment = comment::find($idComment);
        $comment->content=$r->content;
        $comment->save();
        return redirect('/admin/comment/')->with('thongbao','Sửa bình luận thành công');
    }
    function getListActiveComment(){
        $data['i']=1;
        $data['comments']=comment::where('state','1')->orderBy('updated_at','desc')->get();
        return view('backend.comment.activecomment',$data);
    }
    function confirmComment($idComment){
        $comment = comment::find($idComment);
        $comment->state=1;
        $comment->save();
        return redirect('/admin/comment/active')->with('thongbao','Comment đã được phê duyệt thành công');
    }
    function deleteComment($idComment){
        // comment::destroy($idComment);
        $comment = comment::find($idComment);
        $comment->state=2;
        $comment->save();
        return redirect()->back()->with('thongbao','Đã xóa bình luận thành công');
    }
    public function getDeleteMulti(Request $r){
        if($r->comment==NULL){
            return redirect()->back()->with('thongbao2','Bạn chưa chọn bình luận để xóa');
        }
        comment::destroy($r->comment);
        return redirect()->back()->with('thongbao','Đã xóa thành công những bình luận bạn vừa chọn');

    }
    //============================END COMMENT==============================//
    
}
