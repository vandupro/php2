<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'role', 'created_at', 'update_at']; //nhớ nghiên cứu lại
    
}

?>