@extends('layouts.main')
@section('title', 'Cập nhật sản phẩm')
@php
    if(isset($_SESSION['error-product']))
        $err = $_SESSION['error-product'];
@endphp
@section('main-content')
<form style="width: 80%" action="{{ADMIN_URL . 'product/update'}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="hidden" name="id" value="{{$model->id}}">
        <input class="form-control" type="text" name="name" value="{{$model->name}}">
        <span style="color:red">{{isset($err['name']) ? $err['name'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="cate_id">Danh mục</label>
        <select class="form-control" name="cate_id" >
        @foreach($categories as $cate)
            @if($model->cate_id == $cate->id)
            <option selected value="{{$cate->id}}">{{$cate->name}}</option>
            @else
            <option  value="{{$cate->id}}">{{$cate->name}}</option>
            @endif
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" name="image">
        <input type="hidden" name="old_image" value="{{$model->image}}">
        <img width="80" src="{{PUBLIC_URL . $model->image}}" alt=""><br>
        <span style="color:red">{{isset($err['image']) ? $err['image'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input class="form-control" type="number" name="price" value="{{$model->price}}">
        <span style="color:red">{{isset($err['price']) ? $err['price'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="discount">Giảm giá</label>
        <input class="form-control" type="number" min="0" name="discount" value="{{$model->discount}}">
    </div>
    <input type="hidden" class="form-control" type="date" name="updated_at" value="{{date("Y-m-d h:i:sa")}}">
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$model->description}}</textarea>
    </div>
    <button class="btn btn-success mb-3">Cập nhật</button>
</form>
<script src ="https://cdn.tiny.cloud/1/7e7tgoj644o1jcg3cut6nzp82u7lgn1bh244u4rtdr5voxgp/tinymce/5/tinymce.min.js"
 referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>
@endsection
