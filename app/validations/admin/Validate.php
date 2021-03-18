<?php
namespace App\Validations\Admin;
use App\Models\Category;
use App\Models\Product;
class Validate{
    public function checkCategoryData(){
        if(isset($_POST)){
            $data = $_POST;
            $err = [];
            
            if(empty($data['name'])){
                $err['name'] = 'Mời điền tên danh mục!';
            }else{
                if(!empty($data['id'])){
                    $category = Category::find($data['id']);
                    $number = Category::where('name', trim($data['name'], ' '))
                                        ->where('name', '<>', $category->name)
                                        ->count();
                    if($number >= 1)
                        $err['name'] = 'Tên danh mục đã tồn tại';
                }else{
                    $number = Category::where('name', trim($data['name'], ' '))
                                        ->count();
                    if($number > 0)
                        $err['name'] = 'Tên danh mục đã tồn tại';
                }
            }
            $_SESSION['error-category'] = $err;
            if(!empty($err)){
                
                if(isset($data['created_at'])){
                    header('location:' . ADMIN_URL. 'category/insert');die;
                }
                if(isset($data['updated_at'])){
                    header('location:' . ADMIN_URL. 'category/edit/' . $data['id']);die;
                }
            }else{
                unset($_SESSION['error-category']);
            }
        }      
    }
    public function checkProductData(){
        if(isset($_POST)){
            $data = $_POST;
            $arrayTypeImage = ['jpeg', 'png', 'jpg'];
            $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
            $err = [];
            if(empty($data['name'])){
                $err['name'] = 'Mời điền tên sản phẩm!';
            }
            if(empty($data['price']) || $data['price'] <= 0){
                $err['price'] = 'Mời điền giá sản phẩm là số dương!';
            }
            if(isset($data['old_image'])){
                if(!empty($data['name'])){
                    $product = Product::find($data['id']);
                    $number = Product::where('name', trim($data['name'], ' '))
                                      ->where('name', '<>', $product->name) 
                                      ->count();
                    if($number >= 1)
                        $err['name'] = 'Tên sản phẩm đã tồn tại!';
                }
                if(!empty($_FILES['image']['name'])){
                    if(!in_array($imageFileType, $arrayTypeImage)){
                        $err['image'] = 'Mời Up ảnh dạng png/jpg/jpeg!';
                    }
                }
            }else{
                if(!empty($data['name'])){
                    $product = Product::find($data['id']);
                    $number = Product::where('name', trim($data['name'], ' '))
                                      ->count();
                    if($number > 0)
                        $err['name'] = 'Tên sản phẩm đã tồn tại!';
                }
                if(empty($_FILES['image']['name'])){
                    $err['image'] = 'Mời Up ảnh sản phẩm!';
                }
                if(!in_array($imageFileType, $arrayTypeImage)){
                    $err['image'] = 'Mời Up ảnh dạng png/jpg/jpeg!';
                }
                
            }
            
            $_SESSION['error-product'] = $err;
            $_SESSION['data-product'] = $data;
            if(!empty($err)){
               
                if(isset($data['created_at'])){
                    header('location:' . ADMIN_URL. 'product/insert');die;
                }
                if(isset($data['updated_at'])){
                    header('location:' . ADMIN_URL. 'product/edit/' . $data['id']);die;
                }
            }else{
                unset($_SESSION['error-product']);
                unset($_SESSION['data-product']);
            }
        }
    }

    public function checkUserData(){
        if(isset($_POST)){
            $data = $_POST;
            $arrayTypeImage = ['jpeg', 'png', 'jpg'];
            $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
            $err = [];
            if(empty($data['name'])){
                $err['name'] = 'Mời điền tên người dùng!';
            }
            if(empty($data['email'])){
                $err['email'] = 'Mời điền email của người dùng!';
            }
            if(empty($data['password'])){
                $err['password'] = 'Mời điền mật khẩu của người dùng!';
            }
             $data['role'] = (int)$data['role'];
            if(!in_array($data['role'], [0, 200, 900])){
                $err['role'] = 'Mời chọn đúng role!';
            }
            if(isset($data['old_image'])){
                if(!empty($_FILES['image']['name'])){
                    if(!in_array($imageFileType, $arrayTypeImage)){
                        $err['image'] = 'Mời Up ảnh dạng png/jpg/jpeg!';
                    }
                }
            }
            if(!empty($_FILES['image']['name'])){
                if(!in_array($imageFileType, $arrayTypeImage)){
                    $err['image'] = 'Mời Up ảnh dạng png/jpg/jpeg!';
                }
            }
                
            $_SESSION['error-user'] = $err;
            $_SESSION['data-user'] = $data;
            if(!empty($err)){
                
                if(isset($data['created_at'])){
                    header('location:' . ADMIN_URL. 'user/insert');die;
                }
                if(isset($data['updated_at'])){
                    header('location:' . ADMIN_URL. 'user/edit/' . $data['id']);die;
                }
            }else{
                unset($_SESSION['error-user']);
                unset($_SESSION['data-user']);
            }
        }
    }

}

?>