<?php
namespace App\Controllers\Backend;
use App\Models\User;
use App\Controllers\BaseController;

class UserController extends BaseController{
    public function index(){
        $users = User::all();
        $this->render('backend.user.index', compact('users'));
    }
    public function insert(){
        $users = User::all();
        $this->render('backend.user.insert', ['user'=>$users, 'roles'=> ROLES]);
    }

    public function store(){
        $model = new User();
        $file = $_FILES['image'];
        $image = '';
        if ($file['size'] > 0) {
            $image = 'uploads/' . uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], IMAGE_UPLOAD . $image);
            $model->image = $image == '' ? 'no picture' : $image;
        }
        $model->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'user');
    }

    public function edit($id){
        $model = User::find($id);
        if($model){
            $this->render('backend.user.edit', ['model'=>$model, 'roles'=> ROLES]);
        }else{
            header('location:'. ADMIN_URL . 'user');
        } 
    }

    public function update(){
        $id = $_POST['id'];
        $model = User::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'user');
        }
        $file = $_FILES['image'];
        $image = $_POST['old_image'];
        if ($file['size'] > 0) {
            $image = 'uploads/' . uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], IMAGE_UPLOAD . $image);
        }
        $model->image = $image;
        $model->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->fill($_POST);
        $model->save();
        header('location:'. ADMIN_URL . 'user');
    }

    public function delete($id){
        $model = User::find($id);
        if(!$model){
            header('location:'. ADMIN_URL . 'user');
        }
        $model::where('id', $id)->delete();
        header('location:'. ADMIN_URL . 'user');
    }
}
?>