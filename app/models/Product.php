<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'cate_id', 'price', 'discount', 'created_at', 'updated_at'];
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id'); // returned one object
    }
}

?>