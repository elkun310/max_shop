<div class="row" style="font-size:15px">
        <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
            <img src="img/{{$product->img}}" alt="" style="width:100%">
        </div>
        <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
                <div class="product-wrapper">
                    <div class="pull-left">Mã sản phẩm: <span style="font-weight: bold">{{$product->code}}</span></div>
                    <div class="pull-right">Tình trạng: 
                            @if ($product->state==1)<span style="color:aqua;font-weight:bold">Còn hàng</span>
                            @elseif($product->state==0)<span style="color:red">Hết hàng</span>
                            @endif
                    </div>
                </div>
                <div class="product-title">
                    <h3>
                        {{$product->name}} 
                    </h3>
                </div>
                <div class="product-info__price">
                    {{number_format($product->price,0,"",",")}}VNĐ
                </div>
                @foreach (attr_values($product->values) as $key=>$value)
                    <p>{{$key}}:
                    {{implode($value,',')}}</p>
                @endforeach
                <h4 style="font-weight:bold">Thông tin:</h4>   
                <div class="product-info__info"> {!!$product->info!!}</div>
                <h4 style="font-weight:bold">Miêu tả: </h4>
                <div class="product-describe">{!!$product->describe!!}</div>
        </div>
        </div>