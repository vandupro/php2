<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $table = 'invoices';
    public $timestamps = false;
    protected $fillable = ['customer_name', 'customer_phone_number', 'customer_email', 
    'customer_address', 'created_at', 'updated_at', 'status'];

    
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id'); // returned one object
    }
}

?>