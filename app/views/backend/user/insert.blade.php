@extends('layouts.main')
@section('title', 'Thêm mới người dùng')
@section('main-content')
@php
    if(isset($_SESSION['error-user']))
        $err = $_SESSION['error-user'];
    if(isset($_SESSION['data-user']))
        $data = $_SESSION['data-user'];
@endphp
<form style="width: 80%" action="{{ADMIN_URL . 'user/store'}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input class="form-control" value="{{isset($data['name']) ? $data['name'] : ''}}" type="text" name="name">
        <span style="color:red">{{isset($err['name']) ? $err['name'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="">
        @foreach($roles as $role)
            <option value="{{$role['id']}}">{{$role['name']}}</option>
        @endforeach
        </select>
        <span style="color:red">{{isset($err['role']) ? $err['role'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="image">Avatar</label>
        <input type="file" name="image"><br>
        <span style="color:red">{{isset($err['image']) ? $err['image'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" value="{{isset($data['email']) ? $data['email'] : ''}}">
        <span style="color:red">{{isset($err['email']) ? $err['email'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" value="{{isset($data['password']) ? $data['password'] : ''}}">
        <span style="color:red">{{isset($err['password']) ? $err['password'] : ''}}</span>
    </div>
    <input name="created_at" type="hidden" value="{{date("Y-m-d h:i:sa")}}">
    <button class="btn btn-success mb-3">Thêm mới</button>
</form>
@endsection