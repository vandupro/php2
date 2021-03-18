@extends('layouts.main')
@section('title', 'Danh sách order')
@section('main-content')
<!-- section: định nghĩa ra vùng thay đổi trong view -->

<table class="table table-stripped" border="1">
    <thead>
        <th>STT</th>
        <th>Tên khách hàng </th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Chi tiết</th>
        <th>Hành động</th>
    </thead>
    <tbody>
        @foreach($orders as $c)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$c->customer_name}}</td>
            <td>{{$c->created_at}}</td>
            <td>
                @if($c->status == 0) Chưa thanh toán
                @elseif($c->status == 1) Thanh toán
                @endif
            </td>
            <td>
                <a href="{{ADMIN_URL . 'order/detail/' . $c->id}}" class="btn btn-info">Chi tiết </a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{ADMIN_URL . 'order/delete/' . $c->id}}">Xóa</a>
                <a class="btn btn-warning" href="{{ADMIN_URL . 'order/edit/' . $c->id}}">Sửa</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</body>
@endsection
