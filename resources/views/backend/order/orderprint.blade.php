<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Hóa đơn Max-Shop</title>
    <base href="{{asset('')}}">
	<style type="text/css">
	body {
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
		font: 12pt "Tohoma";
	}
	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}
	.page {
		width: 21cm;
		overflow:hidden;
		min-height:297mm;
		padding: 2.5cm;
		margin-left:auto;
		margin-right:auto;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.subpage {
		padding: 1cm;
		border: 5px red solid;
		height: 237mm;
		outline: 2cm #FFEAEA solid;
	}
	@page {
		size: A4;
		margin: 0;
	}
	button {
		width:100px;
		height: 24px;
	}
	.header {
		overflow:hidden;
	}
	.logo {
		background-color:#FFFFFF;
		text-align:left;
		float:left;
	}
	.company {
		padding-top:24px;
		text-transform:uppercase;
		background-color:#FFFFFF;
		text-align:right;
		float:right;
		font-size:16px;
	}
	.title {
		text-align:center;
		position:relative;
		color:#0000FF;
		font-size: 24px;
		top:1px;
	}
	.footer-left {
		text-align:center;
		text-transform:uppercase;
		padding-top:24px;
		position:relative;
		height: 150px;
		width:50%;
		color:#000;
		float:left;
		font-size: 12px;
		bottom:1px;
	}
	.footer-right {
		text-align:center;
		text-transform:uppercase;
		padding-top:24px;
		position:relative;
		height: 150px;
		width:50%;
		color:#000;
		font-size: 12px;
		float:right;
		bottom:1px;
	}
	.TableData {
		background:#ffffff;
		font: 11px;
		width:100%;
		border-collapse:collapse;
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size:12px;
		border:thin solid #d3d3d3;
	}
	.TableData TH {
		background: rgba(0,0,255,0.1);
		text-align: center;
		font-weight: bold;
		color: #000;
		border: solid 1px #ccc;
		height: 24px;
	}
	.TableData TR {
		/* height: 24px; */
		border:thin solid #d3d3d3;
	}
	.TableData TR TD {
		padding-right: 2px;
		padding-left: 2px;
		padding-bottom: 15px;
		border:thin solid #d3d3d3;
	}
	.TableData TR:hover {
		background: rgba(0,0,0,0.05);
	}
	.TableData .cotSTT {
		text-align:center;
		width: 10%;
	}
	.TableData .cotTenSanPham {
		text-align:left;
		width: 40%;
	}
	.TableData .cotHangSanXuat {
		text-align:left;
		width: 20%;
	}
	.TableData .cotGia {
		text-align:right;
		width: 120px;
	}
	.TableData .cotSoLuong {
		text-align: center;
		width: 50px;
	}
	.TableData .cotSo {
		width: 120px;
	}
	.TableData .tong {
		text-align: right;
		font-weight:bold;
		text-transform:uppercase;
		padding-right: 4px;
	}
	.TableData .cotSoLuong input {
		text-align: center;
	}
	@media print {
		@page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}
</style>

</head>
<body>
	<body onload="window.print();">
		<div id="page" class="page">
			<div class="header" style="display: flex">
				<div class="logo"><img src="/frontend/images/logo.jpg" style="width: 20%;"/></div>
				<div class="company">Cửa hàng quần áo thời trang Max-Shop</div>
			</div>
			<br/>
			<div class="title">
				HÓA ĐƠN THANH TOÁN
				<br/>
				-------oOo-------
			</div>
			<br/>
			<br/>
			<table class="TableData" border="1" width="100%">
                <thead>
                  <tr>
                    <th style="width:300px">Mã hóa đơn</th>
                    <th>Tên khách hàng</th>
                    <th class="">Số điện thoại</th>
                    <th class="">Địa chỉ</th>
                    <th>Tên sản phẩm</th>
                    <th class="middle">Số lượng</th>
                    <th class="middle">Giá</th>
                  </tr>
                </thead>
              
                <tbody>
                    <tr>
					<td class="cotSTT" rowspan="{{$count+1}}">#{{$customer->id}}</td>
                        <td class="" rowspan="{{$count+1}}">{{$customer->full_name}}</td>
                        <td class="cotSoLuong" align='center' rowspan="{{$count+1}}">{{$customer->phone}}</td>
                        <td class="cotSo" rowspan="{{$count+1}}">{{$customer->address}}</td> 
                    </tr>
                    @foreach ($customer->order as $row)
                        <tr>
                            <td class="" style="width: 150px;">{{$row->name}}</td>
                            <td>{{$row->quantity}}</td>
                            <td style="width: 80px;">{{number_format($row->price,0,"",",")}} VNĐ</td>
                        </tr> 
                    @endforeach
                    
                </tbody>
            </table>
        <h4 align="right">Tổng tiền : {{number_format($customer->total,0,"",",")}} VNĐ</h4>
		<div class="footer-left"> Hà Nội, ngày {{date("d")}} tháng {{date("m")}} năm {{date("Y")}}<br/>
		Khách hàng 
			<br><br><p>{{$customer->full_name}}</p>
		</div>
		
		<div class="footer-right"> Hà Nội, ngày {{date("d")}} tháng {{date("m")}} năm {{date("Y")}}<br/>
		Nhân viên 
			<br><br><p>{{Auth::user()->full}}</p>
		</div>
	</div>
</body>
</body>
</html>