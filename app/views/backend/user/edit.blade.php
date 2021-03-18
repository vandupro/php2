@extends('layouts.main')
@section('title', 'Cập nhật thông tin người dùng')
@section('main-content')
@php
    if(isset($_SESSION['error-user']))
        $err = $_SESSION['error-user'];
@endphp
<form style="width: 80%" action="{{ADMIN_URL . 'user/update'}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Họ tên</label>
        <input type="hidden" name="id" value="{{$model->id}}">
        <input class="form-control" type="text" name="name" value="{{$model->name}}">
        <span style="color:red">{{isset($err['name']) ? $err['name'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="">
        @foreach($roles as $r)
            @if($r['id'] == $model->role)
            <option selected value="{{$r['id']}}">{{$r['name']}}</option>
            @else
            <option value="{{$r['id']}}">{{$r['name']}}</option>
            @endif
        @endforeach
        </select>
        <span style="color:red">{{isset($err['role']) ? $err['role'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="image">Avatar</label>
        <input type="file" name="image">
        <input type="hidden" name="old_image" value="{{$model->image}}">
        <img width="80" src="{{PUBLIC_URL . $model->image}}" alt=""><br>
        <span style="color:red">{{isset($err['image']) ? $err['image'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" value="{{$model->email}}">
        <span style="color:red">{{isset($err['email']) ? $err['email'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password">
        <span style="color:red">{{isset($err['password']) ? $err['password'] : ''}}</span>
    </div>
    <input name="updated_at" type="hidden" value="{{date("Y-m-d h:i:sa")}}">
    <button class="btn btn-success mb-3">Cập nhật</button>
</form>
@endsection