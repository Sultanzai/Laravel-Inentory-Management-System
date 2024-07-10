<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceView extends Model
{
    protected $table = 'product_price_view';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['P_Name', 'P_Price','O_unit', 'latest_order_date'];
    use HasFactory;
}