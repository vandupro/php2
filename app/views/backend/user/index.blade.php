@extends('layouts.main')
@section('title', 'Danh sách User')

@section('main-content')
        @if($_SESSION[AUTH]['role'] != 900)
            {!!$_SESSION[MESSAGE]!!}
        @else
            <a href="{{ADMIN_URL . 'user/insert'}}" class="btn btn-primary mb-3">Thêm mới</a>
            <table class="table table-stripped" border="1">
                <thead>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Hành động</th>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            <img width="80" src="{{PUBLIC_URL . $u->image}}" alt="">
                        </td>
                        <td>
                            @if($u->role == 200)
                            ADMIN
                            @elseif($u->role == 0)
                            MEMBER
                            @elseif($u->role == 900)
                            SUPER ADMIN
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ADMIN_URL . 'user/delete/' . $u->id}}">Xóa</a>
                            <a class="btn btn-warning" href="{{ADMIN_URL . 'user/edit/' . $u->id}}">Sửa</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
@endsection
