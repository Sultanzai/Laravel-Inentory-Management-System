<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $id = 'id';
    protected $fillable = ['P_Name', 'P_Description', 'P_Units', 'P_Price', 'P_Status', 'P_Date', 'Barcode'];
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'tbl_orderdetail', 'Product_ID', 'Order_ID')
                    ->withPivot('O_Price', 'O_unit');
    }
}
