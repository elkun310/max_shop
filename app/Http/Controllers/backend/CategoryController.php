<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{AddCategoryRequest,EditCategoryRequest};
use App\models\category;
class CategoryController extends Controller
{
    function getCategory(){
        $data['categories']=category::all()->toarray();
        return view('backend.category.category',$data);
    }
    function postCategory(AddCategoryRequest $r){
        if( GetLevel(category::all()->toarray(),$r->idParent,1) > 2)
        {
            return redirect()->back()->withErrors(['name'=>'Giao diện không hỗ trợ danh mục lớn hơn 2 cấp'])->withInput();
        }
        $category = new category;
        $category->name=$r->name;
        $category->slug= str_slug($r->name);
        $category->parent=$r->idParent;
        $category->save();
        return redirect('/admin/category')->with('thongbao','Thêm danh mục thành công');
    }
    function getEditCategory($idCategory){
        $data['categories']=category::all()->toarray();
        $data['category'] = category::find($idCategory);
        return view('backend.category.editcategory',$data);
    }
    function postEditCategory(EditCategoryRequest $r,$idCategory){
        if( GetLevel(category::all()->toarray(),$r->idParent,1) > 2)
        {
            return redirect()->back()->with('error','Giao diện web không hỗ trợ danh mục lớn hơn 2 cấp');
        }
        $category = category::find($idCategory);
        $category->name = $r->name;
        $category->slug=str_slug($r->name);
        $category->parent=$r->idParent;
        $category->save();
        return redirect()->back()->with('thongbao','Đã sửa thành công danh mục');
    }
    function DeleteCategory($idCategory){
        category::destroy($idCategory);
        return redirect('/admin/category')->with('thongbao','Đã xóa thành công');
    }
}
