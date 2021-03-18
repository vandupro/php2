<?php
namespace App\Controllers;
use Jenssegers\Blade\Blade;
class BaseController{
    protected function render($viewFile, $viewData=[]){
        $blade = new Blade('app/views', 'storage');
        // tham số 1: là thư mục chứa tất cả các file giao diện
        // tham số 2: là nơi chứa code sau khi chuyển hóa
        echo $blade->make($viewFile, $viewData)->render();
    }
}

?>