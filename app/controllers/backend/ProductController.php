<?php
namespace App\Controllers\Backend;
use App\Models\Product;
use App\Models\Category;
use App\Models\BaseModel;
use App\Controllers\BaseController;

class ProductController extends BaseController{
    public function index($page=''){
        $keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
        if($keyword != ""){
            $products = Product::where("name", "like", "%$keyword%")
                                ->get();
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = BaseModel::paginate($products, 3, $page);
            $products = Product::take(3)->skip($start)->get();
        }else{
            $products = Product::all();
            // echo '<pre>';
            // var_dump($products);die;
            $page = $page == '' ? 1 : $page;
            $start = BaseModel::paginate($products, 3, $page);
            $products = Product::take(3)
                                ->skip($start)
                                ->orderBy('id', 'desc')
                                ->get();
        }
        $products->load('category');
        $this->render('backend.product.index', compact('products', 'page', 'start'));
    }
    public function insert(){
        $categories = Category::all();
        $this->render('backend.product.insert', compact('categories'));
    }

    public function store(){
        $model = new Product();
        $file = $_FILES['image'];
        $image = '';
        if ($file['size'] > 0) {
            $image = 'uploads/' . uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], IMAGE_UPLOAD . $image);
            $model->image = $image == '' ? 'no picture' : $image;
        }
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'product');
    }

    public function edit($id){
        $model = Product::find($id);
        $categories = Category::all();
        if($model){
            $this->render('backend.product.edit', compact('model', 'categories'));
        }else{
            header('location:'. ADMIN_URL . 'product');
        } 
    }

    public function update(){
        $id = $_POST['id'];
        $model = Product::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'product');
        }
        $file = $_FILES['image'];
        $image = $_POST['old_image'];
        if ($file['size'] > 0) {
            $image = 'uploads/' . uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], IMAGE_UPLOAD . $image);
        }
        $model->image = $image;
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'product');
    }

    public function delete($id){
        $model = Product::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'product');
        }
        $model::where('id', $id)->delete();
        header('location:'. ADMIN_URL . 'product');
    }
}
?>