<?php
namespace App\Controllers\Backend;
use App\Models\Category;
use App\Models\Product;
use App\Models\BaseModel;
use App\Controllers\BaseController;
class CategoryController extends BaseController{ // không cần phải use namespace vì chung controller
    public function index($page=''){
        
        $keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
        if($keyword != ""){
            $cates = Category::where("name", "like", "%$keyword%")->get();
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = BaseModel::paginate($cates, 3, $page);
            $cates = Category::take(3)->skip($start)->get();
        }else{
            $cates = Category::all();
            $page = $page == '' ? 1 : $page;
            $start = BaseModel::paginate($cates, 3, $page);
            $cates = Category::take(3)->skip($start)->get();

        }
        $cates->load('products'); // tải lên trước, sau đó chỉ lấy ra dùng, tăng performence
        //$this->render('cate-list', ['cates' => $cates]);
        $this->render('backend.category.index', compact('cates', 'page', 'start'));
    }
    public function insert(){
        $this->render('backend.category.insert');
    }
    public function store(){
        $model = new Category();
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'category');
    }
    public function edit($id){
        $model = Category::find($id);
        if($model){
            $this->render('backend.category.edit', compact('model'));
        }else{
            header('location:'. ADMIN_URL . 'category');
        }
    }
    public function update(){
        $id = $_POST['id'];
        $model = Category::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'category');
        }
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'category');
    }
    public function delete($id){
        $model = Category::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'category');
        }
        Product::where('cate_id', $id)->delete();
        $model::where('id', $id)->delete();
        header('location:'. ADMIN_URL . 'category');
    }
    
}
?>