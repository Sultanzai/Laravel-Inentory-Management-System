<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tbl_payment';
    protected $id = 'id';
    protected $fillable = ['P_Amount', 'P_Type', 'P_Status', 'P_Date', 'Order_ID', 'Customer_ID'] ;
    
    use HasFactory;
}
