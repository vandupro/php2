@extends('layouts.frontend.layout2')
@section('title', 'Chi tiết đơn hàng')
@section('main-content')
<!-- section: định nghĩa ra vùng thay đổi trong view -->
<div class="container" style="margin-bottom: 50px">
    <h3 style="text-align:center; margin-bottom: 20px">THÔNG TIN HÓA ĐƠN BẠN VỪA MUA</h3>
    <table class="table table-stripped" border="1">
        <thead>
            <th style="width: 15%">Stt</th>
            <th style="width: 25%">Tên sản phẩm</th>
            <th style="width: 25%">Ảnh sản phẩm</th>
            <th style="width: 15%">Số lượng sản phẩm</th>
            <th style="width: 15%">Giảm giá</th>
            <th>giá</th>
        </thead>
        <tbody>
            @foreach($orderDetail as $c)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$c->products->name}}</td>
                <td>
                    <img style="height: 100px" src="{{PUBLIC_URL . $c->products->image}}" alt="">
                </td>
                <td>
                    {{$c->quantity}}
                </td>
                <td>{{$c->unit_discount}}</td>
                <td>{{number_format($c->price, 0)}}</td>
            </tr>
            @php
            $money += $c->quantity * $c->price * (100 - $c->unit_discount)/100
            @endphp
            @endforeach
        </tbody>
    </table>
    <hr>
    <table class="table table-striped">
        <thead>
            <th style="width: 15%">Họ tên khách hàng</th>
            <th style="width: 15%">Số điện thoại</th>
            <th style="width: 15%">Email</th>
            <th style="width: 35%">Địa chỉ</th>
            <th >Ngày đặt</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$order['customer_name']}}</td>
                <td>{{$order['customer_phone_number']}}</td>
                <td>{{$order['customer_email']}}</td>
                <td>{{$order['customer_address']}}</td>
                <td>{{$order['created_at']}}</td>
            </tr>

        </tbody>
    </table>
    <h3>Tổng tiền:{{number_format($money, 0)}} VND</h3>
    <div style="text-align:center">
        <a href="{{BASE_URL . 'product'}}" class="btn btn-info">Tiếp tục mua hàng</a>
    </div>
</div>



@endsection