<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'tbl_customer';
    protected $id = 'id';
    protected $fillables = ['Name', 'Address', 'Balance', 'Phone'];
    
    use HasFactory;
}
