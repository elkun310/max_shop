<?php
function showError($errors,$nameInput){
    if ($errors->has($nameInput))
    {
        echo'<div class="notification-container"><div class="alert alert-danger bg-danger thongbao" role="alert"><strong>';
        echo  $errors->first($nameInput);   
        echo '</strong><i class="pull-right" style="cursor:pointer"><span class="glyphicon glyphicon-remove btn-remove"></span></i></div></div>';
    } 
}
//hiển thị danh mục
function getCategory($danhMuc,$idCha,$chuoiTab,$idSelect)
{
    foreach($danhMuc as $banGhi)
    {
        if($banGhi['parent']==$idCha)
        {
            if($banGhi['id']==$idSelect)
            {
                echo '<option selected value="'.$banGhi['id'].'">'.$chuoiTab.$banGhi['name'].'</option>';           
            }else{
                echo '<option value="'.$banGhi['id'].'">'.$chuoiTab.$banGhi['name'].'</option>';         
            } 
            getCategory($danhMuc,$banGhi['id'],$chuoiTab.'---|',$idSelect);
        }	
    }	 
}
function showCategory($danhMuc,$idCha,$chuoiTab)
{
	foreach($danhMuc as $banGhi)
    {
        if($banGhi['parent']==$idCha)
        {
            echo '<div class="item-menu"><span>'.$chuoiTab.$banGhi['name'].'</span>
            <div class="category-fix">
                <a class="btn-category btn-primary" href="/admin/category/edit/'.$banGhi['id'].'"><i
                        class="fa fa-edit"></i></a>
                <a class="btn-category btn-danger" onclick="return del(\''.$banGhi['name'].'\') " href="/admin/category/del/'.$banGhi['id'].'"><i class="fas fa-times"></i></i></a>

            </div>
        </div>';         
            
            showCategory($danhMuc,$banGhi['id'],$chuoiTab.'---|');
        }	
    }	 
}

//kiểm tra tránh vỡ giao diện
function GetLevel($mang,$parent,$count){
	foreach($mang as $value)
	{
		if($value['id']==$parent){
			$count++;
			if($value['parent']==0)
			{
				return $count;
			}
			return GetLevel($mang,$value['parent'],$count);
		}
	}
}
//hàm lấy giá trị thuộc tính : S,M ,đỏ, xanh ,...
//input: $mang = $product->values
//ouput: array('size'=>array('s','m'),'color'=>array('đỏ','xanh'))
function attr_values($mang){
    $result=array();
    foreach ($mang as $value) {
        $attr=$value->attribute->name;
        $result[$attr][]=$value->value;
    }
    return $result;
}

//hàm lấy ra các biến thể(variant)
function get_combinations($arrays){
    $result=array(array());
    foreach ($arrays as $property => $property_values) {
        $tmp=array();
        foreach ($result as $result_item) {
            foreach ($property_values as $property_value) {
                $tmp[]=array_merge($result_item,array($property=>$property_value));

            }
        }
        $result=$tmp;
    }
    return $result;
}
//check value : trang edit product phần giá trị thuộc tính của sản phẩm
function check_value($product,$value_check){
    foreach ($product->values as $value) {
        if ($value->id == $value_check) {
            return true;
        }
    }
    return false;
}
//kiểm tra biến thể -> edit product trùng-> không thêm
function check_var($product,$array){
    foreach ($product->variant as $row) {
        $mang=array();
        foreach ($row->values as $value) {
            $mang[]=$value->id;
        }
        if (array_diff($mang,$array)==NULL) {
            return false;
        }
    }
    return true;
}
//add giỏ hàng phần giá có biến thể
function getprice($product,$array){
    foreach ($product->variant as $row) {
        $mang=array();
        foreach ($row->values as $value) {
            $mang[]=$value->value;
        }
        if (array_diff($mang,$array)==NULL) {
            if ($row->price==0) {
                return $product->price;
            }
            return $row->price;
        }
    }
    return $product->price;
}