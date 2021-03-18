<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'product_detail';
    public $timestamps = false;
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id'); // returned one object
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'invoice_id');
    }
}
