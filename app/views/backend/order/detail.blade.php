@extends('layouts.main')
@section('title', 'Chi tiết đơn hàng')
@section('main-content')
<!-- section: định nghĩa ra vùng thay đổi trong view -->
<form style="width: 80%" action="{{ADMIN_URL . 'order/detail/edit/'. $check}}" method="POST">
    <input type="hidden" value="{{$check}}">
    <table class="table table-stripped" border="1">
        <thead>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng sản phẩm</th>
            <th>Giảm giá</th>
            <th>giá</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($orderDetail as $c)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$c->products->name}}</td>
                <td>
                    <input type="number" min="1" name="quantity[]" value="{{$c->quantity}}">
                </td>
                <td>{{$c->unit_discount}}</td>
                <td>{{number_format($c->price, 0)}}</td>
                <td>
                    <a class="btn btn-danger" 
                    href="{{ADMIN_URL . 'order/detail/delete/'. $check . '/' . $c->products->id}}">Xóa</a>
                </td>
            </tr>
            @php
            $money += $c->quantity * $c->price * (100 - $c->unit_discount)/100
            @endphp
            @endforeach

        </tbody>
    </table>
    <div style="text-align:center">
        <button class="btn btn-warning mb-3" type="submit" >Cập nhật</button>
    </div>
</form>

<hr>
<table class="table table-striped">
    <thead>
        <th>Họ tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt</th>
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

@endsection