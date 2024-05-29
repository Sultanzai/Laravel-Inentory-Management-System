<?php

namespace App\Http\Controllers;

use App\Models\Expances;
use Illuminate\Http\Request;

class ExpancesController extends Controller
{
    
    public function index()
    {
        $expances = Expances::all();
        return view('Expances-page')->with('expances', $expances);
    }

}
