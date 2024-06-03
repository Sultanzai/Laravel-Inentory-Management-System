<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'tbl_orders';
    protected $id = 'id';
    protected $fillable = ['O_Description', 'O_Date', 'Customer_ID'] ;
    
    use HasFactory;
     public function products()
    {
        return $this->belongsToMany(Product::class, 'tbl_orderdetail', 'Order_ID', 'Product_ID')
                    ->withPivot('O_Price', 'O_unit');
    }
}
