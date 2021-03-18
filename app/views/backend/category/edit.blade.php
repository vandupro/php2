@extends('layouts.main')
@section('main-content')
@php
    if(isset($_SESSION['error-category'])){
        $err = $_SESSION['error-category'];
        unset($_SESSION['error-category']);
    }
@endphp
<form action="{{ADMIN_URL . 'category/update'}}" method="post">
    <input type="hidden" name="id" value="{{$model->id}}">
    <input name="updated_at" type="hidden" value="{{date("Y-m-d h:i:sa")}}">
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input class="form-control" type="text" name="name" value="{{$model->name}}">
        <span style="color:red">{{isset($err) ? $err['name'] : ''}}</span>
    </div>
   
    <div>
        <label for="">Show menu</label><br>
        @if($model->show_menu == 1)
            <input type="radio" name="show_menu" value="0"> Không
            <input type="radio" name="show_menu" checked value="1"> Có
        @else
            <input class="ml-3" type="radio" name="show_menu" checked value="0"> Không
            <input class="ml-3" type="radio" name="show_menu" value="1"> Có
        @endif
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea class="form-control" name="description" id="" cols="50" rows="5">{{$model->description}}</textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Lưu</button>
    </div>
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