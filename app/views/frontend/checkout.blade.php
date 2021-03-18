@extends('layouts.frontend.layout2')
@section('main-content')
@php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if(isset($_SESSION['info']))
        $info = $_SESSION['info'];
    if(isset($_SESSION['err-cart']))
        $err = $_SESSION['err-cart'];
@endphp
<div style="padding: 1em;" class="ckeckout">
    <div class="container">
    <h3 style="padding-bottom: 25px">{{isset($err['cart']) ? $err['cart'] : ''}}</h3>
    <h4 style="color:green">{{isset($message) ? $message : ''}}</h4>
        <div class="ckeck-top heading">
            <h2>FORM CHECKOUT</h2>
        </div>
        <div class="ckeckout-top">
            <form style="width: 60%; margin: 0 auto" action="{{BASE_URL . 'checkout/store'}}" method="POST">
                <input name="created_at" type="hidden" value="{{date("Y-m-d h:i:sa")}}">
                <div class="form-group">
                    <label for="name">Customer name <span style="color:red"> *required</span></label>
                    <input class="form-control" type="text" name="customer_name" 
                    value="{{isset($info['customer_name']) ? $info['customer_name'] : ''}}">
                    <span style="color:red">{{isset($err['name']) ? $err['name'] : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number <span style="color:red"> *required</span></label>
                    <input class="form-control" type="text" name="customer_phone_number"
                    value="{{isset($info['customer_phone_number']) ? $info['customer_phone_number'] : ''}}">
                    <span style="color:red">{{isset($err['phone']) ? $err['phone'] : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="email">Customer email <span style="color:red"> *required</span></label>
                    <input class="form-control" type="email" name="customer_email"
                    value="{{isset($info['customer_email']) ? $info['customer_email'] : ''}}">
                </div>
                <div class="from-group">
                    <label for="address">Customer address <span style="color:red"> *required</span></label>
                    <textarea class="form-control" name="customer_address" id="" cols="30" rows="10">{{isset($info['customer_address']) ? $info['customer_address'] : ''}}</textarea>
                    <span style="color:red">{{isset($err['address']) ? $err['address'] : ''}}</span>
                </div>
                <div style="text-align:center" class="form-group">
                    <button class="btn btn-success mt-3" type="submit">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('breadcrumbs')
<div class="container">
    <div class="breadcrumbs-main">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Checkout</li>
        </ol>
    </div>
</div>
@endsection