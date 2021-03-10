@extends('backend.master.master')
@section('title','Thống kê')
@section('content')
@section('report','class= active')
	<!--main-->
	<style>
		.sort-month{
			margin: 20px;
		}
		.sort-month .selectpicker{
			border-radius: 10px;
    		padding: 5px 0;
			font-size: 17px;
		}
	</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Thống kê</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="sort-month">
			<h4 style="font-weight: bold">Chọn tháng</h4>
			<div class="row">
				
				<div class="col-md-3">
					<select name="report_months" class="selectpicker report_month" style="width:100%" data-none-selected-text="Không có mục nào được chọn" tabindex="-98">
							<option value="">Tất cả</option> 
							{{-- <option value="1">Tháng 1</option>
							<option value="2">Tháng 2</option>
							<option value="3">Tháng 3</option>
							<option value="4">Tháng 4</option>
							<option value="5">Tháng 5</option>
							<option value="6">Tháng 6</option>
							<option value="7">Tháng 7</option>
							<option value="8">Tháng 8</option>
							<option value="9">Tháng 9</option>
							<option value="10">Tháng 10</option>
							<option value="11">Tháng 11</option>
							<option value="12">Tháng 12</option> --}}
							<?php $month_now= Carbon\Carbon::now()->format('m');?>
							@for($i=1;$i<=$month_now;$i++)
								<option value="{{$i}}">Tháng {{$i}}</option>
							@endfor()
						</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary sort-ajax">
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>Mã đơn hàng</th>
											{{-- <th>Tên khách hàng</th> --}}
                                            <th>Tổng số sản phẩm</th>
                                            <th>Ngày lập</th>
											<th>Số tiền thu được</th>
										</tr>
									</thead>
									<tbody id="posts">
										@if ($count<=0)
											<tr class="odd">
												<td valign="top" colspan="12" class="dataTables_empty">Không có dữ liệu</td>
											</tr>
                                        @endif
                                        @foreach ($reports as $report)
                                        <tr>
                                            <td>#{{$report->id}}</td>
                                            {{-- <td>{{$report->full_name}}</td> --}}
                                            <td>
                                                <!--nqha-vinno-->
                                                @foreach ($report->order as $order)
                                                    {{$order->where('customer_id',$report->id)->sum('quantity')}}
                                                    <?php break; ?>
                                                    <?php continue; ?>
                                                @endforeach
                                                <!--end-nqha-vinno-->
                                            </td>
                                            
                                            <td>{{Carbon\Carbon::parse($report->created_at)->format('d-m-Y H:m:s')}}</td>
                                            <td style="font-weight:bolder">{{number_format($report->total,0,"",",")}} VNĐ</td>
                                        </tr>
                                        @endforeach
                                        
										

									</tbody>
								</table>
							</div>
                        </div>
                        <h4 style="font-weight: bolder;color: red;text-align: center">Tổng doanh thu : {{number_format($sum_money,0,"",",")}} VNĐ</h4>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="dataTables_info" id="table-leads_info" role="status" aria-live="polite">
									@if ($count<6)
										Xem từ 1 đến {{$count}} của {{$count}} mục
									@elseif($count>=6)
										Xem từ 1 đến 6 của {{$count}} các mục
									@endif
								</div>
							</div>
						</div>
						<div align="right" id="pagination">
							@if (isset($_GET))
							{{$reports->appends($_GET)->links()}}
							@else
							{{$reports->links()}}
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection
@section('script')
	@parent
	<script>
		$('.report_month').on('change',function(){
			// var month = $(this).find(':selected')[0].id;
			// alert(id);
			var month = $(this).children("option:selected").val();
			
			$.ajax({
	            url: "/admin/report/sort-report",
	            type: 'get',
	            data: {month: month},    
	            success: function(response){ 
					$('.sort-ajax').empty();
					$('.sort-ajax').html(response);
				}
	          });
		})

		$('#pagination a').on('click', function(e){
			e.preventDefault();
			var url = $(this).attr('href');
			var number = $(this).text();
			console.log(number);
			console.log(url);
	// 		$.ajax({
	// 	            url: "/admin/report/paginate",
	// 	            type: 'get',
	// 	            data: {number: number},  
	// 	            success: function(response){
	// 					$('.sort-ajax').empty();
	// 					$('.sort-ajax').html(response);  
	// 	              }
	//           	});


			// $.get(url, $('#search').serialize(), function(data){
			// 	var x = document.getElementsByTagName("BODY")[0];
			// 	$("BODY").html(data);
			// });
		});
	</script>
@endsection