@extends('layouts.main')
@section('title', 'Thêm mới sản phẩm')
@php
    if(isset($_SESSION['error-product'])){
        $err = $_SESSION['error-product'];
        unset($_SESSION['error-product']);
    }
    if(isset($_SESSION['data-product'])){
        $data = $_SESSION['data-product'];
        unset($_SESSION['data-product']);
    }
@endphp
@section('main-content')
<form style="width: 80%" action="{{ADMIN_URL . 'product/store'}}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input class="form-control" type="text" name="name" value="{{isset($data['name']) ? $data['name'] : ''}}">
        <span style="color:red">{{isset($err['name']) ? $err['name'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="cate_id">Danh mục</label>
        <select class="form-control" name="cate_id" id="">
        @foreach($categories as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" name="image"><br>
        <span style="color:red">{{isset($err['image']) ? $err['image'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input class="form-control" type="number" name="price" value="{{isset($data['price']) ? $data['price'] : ''}}">
        <span style="color:red">{{isset($err['price']) ? $err['price'] : ''}}</span>
    </div>
    <div class="form-group">
        <label for="discount">Giảm giá</label>
        <input class="form-control" min="0" type="number" value="0" name="discount" value="{{isset($data['discount']) ? $data['discount'] : ''}}">
    </div>
    <input type="hidden" class="form-control" type="date" name="created_at" value="{{date("Y-m-d h:i:sa")}}">
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10">
            {{isset($data['description']) ? $data['description'] : ''}} 
        </textarea>
    </div>
    <button class="btn btn-success mb-3">Thêm mới</button>
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