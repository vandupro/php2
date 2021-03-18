@extends('layouts.main')
@section('main-content')
@section('title', 'Cập nhật đơn hàng')
<form style="width: 80%" action="{{ADMIN_URL . 'order/update'}}" method="post">
    <input type="hidden" name="id" value="{{$model->id}}">
    <div class="form-group">
        <label for="">Địa chỉ giao hàng</label>
        <input class="form-control" type="text" name="customer_address" value="{{$model->customer_address}}">
    </div>
        <label for="">Trạng thái</label><br>
        @if($model->status == 1)
            <input class="ml-3" type="radio" name="status" value="0"> Chưa thanh toán
            <input class="ml-3" type="radio" name="status" checked value="1"> Đã thanh toán
        @elseif($model->status == 0)
            <input class="ml-3" type="radio" name="status" checked value="0"> Chưa thanh toán
            <input class="ml-3" type="radio" name="status" value="1"> Đã thanh toán
        @endif
    </div>
    <div class="form-group">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Lưu</button>
    </div>
</form>
@endsection