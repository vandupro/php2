<?php
namespace App\Validations\Client;

class Info{
    public function checkInfoData(){
        if(isset($_POST)){
            $data = $_POST;
            $cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
            $err = [];
            if(empty($cart)){
                $err['cart'] = 'Vui lòng thêm hàng hóa nếu giỏ hàng đang rỗng';
            }
            if(empty($data['customer_name'])){
                $err['name'] = 'Mời bạn điền tên';
            }
            if(empty($data['customer_phone_number'])){
                $err['phone'] = 'Mời bạn điền số điện thoại';
            }
            if(empty(trim($data['customer_address']))){
                $err['address'] = 'Mời bạn điền địa chỉ';
            }

            $_SESSION['err-cart'] = $err;
            $_SESSION['info'] = $_POST;

            if(!empty($err)){
                // echo '<pre>';
                // var_dump($err);die;
                header('location:' . BASE_URL . 'checkout');die;
            }else{
                unset($_SESSION['err-cart']);
                unset($_SESSION['info']);
                // $_SESSION['success'] = 'Mua hàng thành công';
            }
        }
    }
}

?>