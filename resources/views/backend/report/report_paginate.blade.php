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
    <h4 style="font-weight: bolder;color: red;text-align: center">Tổng lợi nhuận : {{number_format($sum_money,0,"",",")}} VNĐ</h4>
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
        {{-- @if (isset($_GET))
        {{$reports->appends($_GET)->links()}}
        @else --}}
        {{-- {{$reports->links()}} --}}
        {{-- @endif --}}
    </div>
</div>
