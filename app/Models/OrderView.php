<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderView extends Model
{
    protected $table = 'order_view';
    public $timestamps = false;
    protected $fillable = [
        'Order_ID', 'Customer_ID', 'O_Date', 'OrderDetail_ID', 'O_price', 'O_unit', 'Customer_Name'
    ];
    use HasFactory;
}
