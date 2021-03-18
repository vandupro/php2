<?php
    namespace App\Controllers\Backend;
    use App\Controllers\BaseController;
    use App\Models\User;
    class LoginController extends BaseController{
        public function login($mes=''){
            $this->render('backend.acount.login');
        }
        public function postLogin(){
            $email = isset($_POST['email']) == true ? trim($_POST['email']) : "";
            $password = isset($_POST['password']) == true ? trim($_POST['password']) : "";
    
            if(empty($email) || empty($password)){
                header('location: ' . BASE_URL . 'login/tai-khoan-khong-chinh-xac');
                die;
            }
    
            $user = User::where('email', $email)->first();
    
            if(
                empty($user) || 
                !password_verify($password, $user->password)
            ){
                header('location: ' . BASE_URL . 'login/thong-tin-khong-chinh-xac');
                die;
            }
    
            $_SESSION[AUTH] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'image' => $user->image
            ];
            header('location: ' . ADMIN_URL);
    
        }
    
        public function logout(){
            unset($_SESSION[AUTH]);
            //var_dump($_SESSION[AUTH]);die;
            header('location: ' . BASE_URL . 'login');
        }

    }
?>