<b>MaxShop xin kính chào quý khách!!!</b>
<p>Quý khách vừa đặt hàng tại website của cửa hàng MaxShop</p>
<b>Thông tin liên hệ</b><br>
<b>Khách hàng</b> : {{$full}}<br>
<b>Số điện thoại </b>:{{$phone}}<br>
<b>Địa chỉ </b>:{{$address}}<br>
<b>Thông tin đơn hàng</b><br><br>
<table border="1" cellspacing="0" cellpadding="10" width="100%">
    <tr bgcolor="#305eb3">
      <th width="70%"><font color="#FFFFFF">Tên sản phẩm</font></th>
      <th width="10%"><font color="#FFFFFF">Số lượng</font></th>
      <th width="20%"><font color="#FFFFFF">Giá thành</font></th>
    </tr>
    @foreach ($content as $product)
        <tr>
            <td width="70%">{{$product->name}}</td>
            <td width="10%">{{$product->qty}}</td>
            <td width="20%">{{number_format($product->price,0,"",",")}}VNĐ</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2" width="70%"></td>
        <td width="20%"><b><font color="#FF0000">{{$total}} VNĐ</font></b></td>
    </tr>
</table>
<p>Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.</p>
<p>Chúc anh(chị) <b>{{$full}}</b> một ngày vui vẻ.</p>
<p>Trân trọng</p>
