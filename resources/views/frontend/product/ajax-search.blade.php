<img id="loading-image" src="/frontend/images/loading.gif" style="display:none;margin: auto;width:100%"/>
    {{-- <div class="row row-pb-lg"> --}}
        @foreach ($products as $product)
            <div class="col-md-4 text-center">
                <div class="product-entry">
                    <div class="product-img" onclick="location.href='/product/detail/{{$product->slug}}-{{$product->id}}.html'" style="background-image: url(/backend/img/{{$product->img}});cursor:pointer">
                        <p class="tag"><span class="new">New</span></p>
                        <div class="cart">
                            <p>
                                <span class="addtocart"><a href="/product/detail/{{$product->slug}}-{{$product->id}}.html"><i class="icon-shopping-cart"></i></a></span>
                                <span><a href="/product/detail/{{$product->slug}}-{{$product->id}}.html"><i class="icon-eye"></i></a></span>


                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="/product/detail/{{$product->slug}}-{{$product->id}}.html">{{$product->name}}</a></h3>
                        <p class="price"><span>{{number_format($product->price,0,"",",")}} VNĐ</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- </div> --}}
    {{-- <div class="row">
        <div class="col-md-12" align="right">
            {{$products->links('vendor.pagination.default')}}
        </div>
    </div> --}}
