@extends('layouts.frontend.layout2')
@section('main-content')
<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>CHECKOUT</h2>
        </div>
        <div class="ckeckout-top">
            <h3>My Shopping Bag ({{count($cart)}})</h3>
            <form action="{{BASE_URL . 'cart/update'}}" method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 15%">Item</th>
                            <th style="width: 15%">Product name</th>
                            <th style="width: 15%">Unit price</th>
                            <th style="width: 25%">Quantity</th>
                            <th style="margin-right: 15%">Total price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sumMoney = 0;
                            $index = -1;
                        @endphp
                        @foreach($cart as $c)
                            @php
                                $index++;
                                $sumMoney += $c['quantity'] * $c['price'];
                                $_SESSION['money'] = $sumMoney;
                            @endphp
                        <tr>
                            <td>
                                <img width="50" src="{{PUBLIC_URL . $c['image']}}" />
                            </td>
                            <td>{{ $c['name'] }}</td>
                            <td>{{ number_format($c['price'], 0) }}</td>
                            <td>
                                <input type="number" name="quantity[{{ $c['id'] }}]" min="1" value="{{ $c['quantity'] }}">
                            </td>
                            <td>{{ number_format($c['quantity'] * $c['price'], 0) }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{BASE_URL . 'cart/delete/' . $index}}">Remove</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: right">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a class="btn btn-success" href="{{BASE_URL . 'checkout'}}">Checkout</a>
                </div>
            </form>
            <h3 >Total Money: <span style="color: green">{{number_format($sumMoney, 0)}}</span></h3>
        </div>
    </div>
</div>


@endsection
@section('breadcrumbs')
<div class="container">
    <div class="breadcrumbs-main">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Cart</li>
        </ol>
    </div>
</div>
@endsection