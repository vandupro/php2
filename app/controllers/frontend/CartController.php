<?php
namespace App\Controllers\Frontend;
use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
class CartController extends BaseController{
    public $categories;
    function __construct()
    {
        $this->categories = Category::where('show_menu', 1)->get();
    }
    public function index(){
        $cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
        $this->render('frontend.cartPage', [
            'categories' => $this->categories,
            'cart' => $cart
        ]);
    }
    public function addToCart($id){
        $cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
        // dựa vào id nhận đc, lấy ra thông tin sản phẩm => mảng
        $product = Product::find($id);
        $product->load('category');
        $product = $product->toArray();
        // kiểm tra trong giỏ hàng xem đã có sản phẩm này hay chưa ?
        $existedIndex = -1;
        
        for($i = 0; $i < count($cart); $i++){
            if($cart[$i]['id'] == $id){
                $existedIndex = $i;
                break;
            }
        }
        if($existedIndex == -1){
            // nếu chưa có thì bổ sung thêm 1 phần tử trong mảng sản phẩm là quantity = 1
            // sau đó add sản phẩm vào biến $cart
            $product['quantity'] = 1;
            array_push($cart, $product);
        }else{
            // nếu sản phẩm đã có trong giỏ hàng rồi
            // thì thay đổi giá trị của phần tử quantity += 1
            $cart[$existedIndex]['quantity'] += 1;
        }

        $_SESSION[CART] = $cart;

        header('location: ' . BASE_URL . 'cart');
        die;
    }

    public function updateCart(){
        $cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
        $quantity = $_POST['quantity'];
        $test = [];
        foreach($quantity as $key=>$value){
            $test[] = $value;
        }
        for($i=0; $i<count($cart); $i++){
            $cart[$i]['quantity'] = $test[$i];
        }
        $_SESSION[CART] = $cart;
        $this->index();
    }

    public function clearCart($id){
        $cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
        array_splice($cart,$id,1);
        if(count($cart) == 0){
            unset($_SESSION['money']);
        }
        $_SESSION[CART] = $cart;
        header('location:'. BASE_URL . 'cart');
    }

    public function checkout(){
        $this->render('frontend.checkout', [
            'categories' => $this->categories,
        ]);
    }

    public function storeOrder(){
        $cart = isset($_SESSION[CART]) == true ? $_SESSION[CART] : [];
        $order = new Order();
        $order_detail = new OrderDetail();
        if(isset($_POST)){
            $message = '';
            $order->fill($_POST);
            if(isset($_SESSION['money']))
                $order->total_price = $_SESSION['money'];
            $order->save();
            $latestOrder = Order::orderBy('created_at', 'desc')->take(1)->get()->toArray();
            $data = [];
            foreach($cart as $c){
                $data[] = [
                    'price' =>$c['price'],
                    'unit_discount' => $c['discount'],
                    'quantity' => $c['quantity'],
                    'invoice_id' => $latestOrder[0]['id'],
                    'product_id' => $c['id']
                ];
            }
            if( $order_detail::insert($data)){
                unset($_SESSION[CART]);
                unset($_SESSION['money']);
                $_SESSION['latestOrder_id'] = $latestOrder[0]['id'];
                header('location:'. BASE_URL . 'cart/detail');
            }
        }

        
    }
    public function cartDetail(){
        if(isset($_SESSION['latestOrder_id'])){
            $id = $_SESSION['latestOrder_id'];
            $money = 0;
            $orderDetail = OrderDetail::where('invoice_id', $id)->get();
            $order = Order::find($id);
            $this->render('frontend.cartDetail', [
                'categories'=>$this->categories,
                'order'=>$order,
                'money'=>$money,
                'orderDetail'=>$orderDetail
            ]);
            //unset($_SESSION['latestOrder_id']);
        }else{
            header('location:'. BASE_URL . 'cart');
        }
    }

}

?>