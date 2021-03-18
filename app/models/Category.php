<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'show_menu', 'created_at', 'updated_at']; //nhớ nghiên cứu lại
    protected $attributes = [
        'show_menu' => 0
    ];
    public function products(){
        return $this->hasMany(Product::class, 'cate_id');
    }
}

?>