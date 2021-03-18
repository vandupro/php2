@extends('layouts.main')
@section('title', 'Danh sách sản phẩm')
@section('main-content')
<a class="btn btn-primary mb-3" href="{{ADMIN_URL . 'product/insert'}}">Thêm mới</a>
<table class="table table-hovered">
    <thead>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên danh mục</th>
        <th>Giá</th>
        <th>View</th>
        <th>Giảm giá(%)</th>
        <!-- <th>Ngày cập nhật</th> -->
        <th>Hành động</th>
    </thead>
    <tbody>
        @foreach($products as $item)
            <tr>
                <td>{{$start + $loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <img width="80" style="height: 100px;" src="{{PUBLIC_URL . $item->image}}" alt="">
                </td>
                <td>{{$item->category->name}}</td>
                <td>{{number_format($item->price, 0)}}</td>
                <td>{{$item->views}}</td>
                <td>{{$item->discount}}</td>
                <td>
                    <a class="btn btn-warning" href="{{ADMIN_URL . 'product/edit/' . $item->id}}">Sửa</a>
                    <a class="btn btn-danger" href="{{ADMIN_URL . 'product/delete/' . $item->id}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
@section('pagination_page')
<nav aria-label="...">
    <ul class="pagination">
    @if(!isset($_GET['keyword']))
        @for($i = 1; $i <= $_SESSION['total_page']; $i++)
            <li class="page-item  {{$i==$page?'active':''}}">
                <a class="page-link" href="{{ADMIN_URL . 'product/'. $i}}">{{$i}} <span class="sr-only">(current)</span></a>
            </li>
        @endfor
    @else
        @for($i = 1; $i <= $_SESSION['total_page']; $i++)
            <li class="page-item  {{$i==$page?'active':''}}">
                <a class="page-link" href="{{ADMIN_URL . 'product?keyword='. $_GET['keyword'] . '&page=' . $i}}">{{$i}} <span class="sr-only">(current)</span></a>
            </li>
        @endfor
    @endif
    </ul>
</nav>
@endsection