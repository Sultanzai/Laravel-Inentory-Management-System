<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'tbl_customer';
    protected $id = 'id';
    protected $fillable = ['Name', 'Address', 'Phone','Balance'];
    
    use HasFactory;
    
    public function order()
{
    return $this->hasMany(Order::class, 'Customer_ID');
}
}
