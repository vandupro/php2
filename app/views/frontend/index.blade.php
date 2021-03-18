@extends('layouts.frontend.layout1')
@section('main-content')
<div class="product">
    <h3 style="text-align:center">LATEST PRODUCT</h3>
    <div class="container">
        <div class="product-top">
            <div class="row product-one">
                @foreach($latesProduct as $lp)
                <div class="col-md-3 product-left">
                    <div style="height: 400px" class="product-main simpleCart_shelfItem">
                        <a href="{{BASE_URL . 'product-detail/' . $lp->id}}" class="mask"><img class="img-responsive zoom-img"
                                src="{{PUBLIC_URL . $lp->image}}" alt="" style="height: 200px" /></a>
                        <div style="padding: 0 15px" class="product-bottom">
                            <h3 >{{$lp->name}}</h3>
                            <p>Explore Now</p>
                            <h4>
                                <!-- <a class="item_add" href="#"><i></i></a>  -->
                                <span class=" item_price">$ {{number_format($lp->price, 0)}}</span>
                            </h4>
                        </div>
                        <div class="srch">
                            <span>-{{$lp->discount}}%</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="clearfix"></div> -->
            </div>
        </div>
    </div>
</div>
@endsection