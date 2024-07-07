<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'tbl_company';
    protected $id = 'id';
    protected $fillable = ['C_Name', 'C_Phone', 'C_Description','C_Amount','C_Status','C_Type'];
    use HasFactory;
}
