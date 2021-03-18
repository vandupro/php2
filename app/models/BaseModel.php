<?php
namespace App\Models;
class BaseModel{
    static function paginate($results, $limit, $page=1){
        if(count($results) > 0){
            $total_records = count($results);
            $total_page = ceil($total_records / $limit);
            $_SESSION['total_page'] = $total_page;
            if($page > $total_page || $page <= 0)
                header('location:'. ADMIN_URL . 'category/1');
            $pageNumber = $page;
            $offset = ($pageNumber - 1) * $limit;
            return $offset;
        }
    }
}

?>