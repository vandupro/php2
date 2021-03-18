<?php
namespace App\Controllers\Backend;
use App\Controllers\BaseController;
class HomeController extends BaseController{
    
    public function index(){
        $this->render('backend.index');
    }
}

?>