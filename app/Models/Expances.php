<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expances extends Model
{
    protected $table = 'tbl_expances';
    protected $id = 'id';
    protected $fillable = ['E_Name', 'E_Descriptio', 'E_Amount','E_Date'];
    
    use HasFactory;
}
