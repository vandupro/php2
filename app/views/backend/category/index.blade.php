@extends('layouts.main')
@section('title', 'Danh sách danh mục')
@section('main-content')
<!-- section: định nghĩa ra vùng thay đổi trong view -->
<a href="{{ADMIN_URL . 'category/insert'}}" class="btn btn-primary mb-3">Thêm mới</a>
<table class="table table-stripped" border="1">
    <thead>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Miêu tả</th>
        <th>Show menu</th>
        <th>Số sản phẩm</th>
        <th>Hành động</th>
    </thead>
    <tbody>
        @foreach($cates as $c)
        <tr>
            <td>{{$start + $loop->iteration}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->description}}</td>
            <td>{{$c->show_menu?'có':'không'}}</td>
            <td>{{count($c->products)}}</td>
            <td>
                <a class="btn btn-danger" href="{{ADMIN_URL . 'category/delete/' . $c->id}}">Xóa</a>
                <a class="btn btn-warning" href="{{ADMIN_URL . 'category/edit/' . $c->id}}">Sửa</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</body>
@endsection
@section('pagination_page')
<nav aria-label="...">
    <ul class="pagination">
    @if(!isset($_GET['keyword']))
        @for($i = 1; $i <= $_SESSION['total_page']; $i++)
            <li class="page-item  {{$i==$page?'active':''}}">
                <a class="page-link" href="{{ADMIN_URL . 'category/'. $i}}">{{$i}} <span class="sr-only">(current)</span></a>
            </li>
        @endfor
    @else
        @for($i = 1; $i <= $_SESSION['total_page']; $i++)
            <li class="page-item  {{$i==$page?'active':''}}">
                <a class="page-link" href="{{ADMIN_URL . 'category?keyword='. $_GET['keyword'] . '&page=' . $i}}">{{$i}} <span class="sr-only">(current)</span></a>
            </li>
        @endfor
    @endif
    </ul>
</nav>
@endsection