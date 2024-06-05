<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderView extends Model
{
    protected $table = 'order_view';
    public $timestamps = false;
    protected $fillable = [
        'Order_ID', 'Customer_ID', 'O_Date', 'Customer_Name', 'OrderDetail_IDs', 'OrderPrices', 'OrderUnits', 'ProductNames', 'ProductBarcodes', 'TotalPrice'
    ];
    use HasFactory;
}
