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

    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('P_Price');
    }
}
