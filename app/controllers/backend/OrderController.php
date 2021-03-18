<?php
namespace App\Controllers\Backend;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BaseModel;
use App\Controllers\BaseController;
class OrderController extends BaseController{ // không cần phải use namespace vì chung controller
    public function index($page=''){
        
        // $keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
        // if($keyword != ""){
        //     $cates = Category::where("name", "like", "%$keyword%")->get();
        //     $page = isset($_GET['page']) ? $_GET['page'] : 1;
        //     $start = BaseModel::paginate($cates, 3, $page);
        //     $cates = $cates->skip($start)->take(3)->all();
        // }else{
        //     $cates = Category::all();
        //     $page = $page == '' ? 1 : $page;
        //     $start = BaseModel::paginate($cates, 3, $page);
        //     $cates = $cates->skip($start)->take(3)->all();

        // }
        $orders = Order::all();
        //$cates->load('products'); // tải lên trước, sau đó chỉ lấy ra dùng, tăng performence
        //$this->render('cate-list', ['cates' => $cates]);
        $this->render('backend.order.index', compact('orders'));
    }
    public function insert(){
        $this->render('backend.category.insert');
    }
    public function store(){
        $model = new Order();
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'order');
    }
    public function edit($id){
        $model = Order::find($id);
        if($model){
            $this->render('backend.order.edit', compact('model'));
        }else{
            header('location:'. ADMIN_URL . 'order');
        }
    }
    public function update(){
        $id = $_POST['id'];
        $model = Order::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'order');
        }
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'order');
    }
    public function delete($id){
        $model = Order::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'order');
        }
        OrderDetail::where('invoice_id', $id)->delete();
        $model::where('id', $id)->delete();
        header('location:'. ADMIN_URL . 'order');
    }

    public function detail($id){
        $money = 0;
        $check = $id;
        $orderDetail = OrderDetail::where('invoice_id', $id)->get();
        $order = Order::find($id);
        $this->render('backend.order.detail', compact('orderDetail', 'money', 'order', 'check'));  
    }
    public function updateDetail($id){
        $models = OrderDetail::where('invoice_id', $id)->get();
        $numbers = $_POST['quantity'];  
        if(!empty($model)){
            header('location:'. ADMIN_URL . 'order/detail/' . $id);
        }else{
            for($i = 0; $i < count($models); $i++){
                $models[$i]->quantity = (int)$numbers[$i];
                $models[$i]->save();
            }
            
            header('location:'. ADMIN_URL . 'order/detail/' . $id);
        }
    }
    public function removeDetail($id, $p){
        $model = OrderDetail::where('product_id', $p);
        if(!$model){
            header('location:'. ADMIN_URL . 'order/detail/' . $id);
        }else{
            $model->delete();
            $orderDetails = OrderDetail::where('invoice_id', $id)->get();
            if(count($orderDetails) == 0){
                Order::find($id)->delete();
                header('location:'. ADMIN_URL . 'order');die;
            }else{
                header('location:'. ADMIN_URL . 'order/detail/' . $id);
            }
        }
    }
    
}
?>