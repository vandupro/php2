<?php
namespace App\Validations;

class Auth{
    public function checkLogin($role = MEMBER_ROLE){
        if (!isset($_SESSION[AUTH]) || empty($_SESSION[AUTH]) || $_SESSION[AUTH]['role'] < $role) {
            header('location:' . BASE_URL . 'login');
        }
    }

    public function checkAuth($role = MEMBER_ROLE){
        if($_SESSION[AUTH]['role'] != 900){
            $_SESSION[MESSAGE] = '<div class="alert alert-danger" role="alert">
                                       Bạn không đủ quyền xem chức năng này!
                                   </div>';
       }
    }
}


?>