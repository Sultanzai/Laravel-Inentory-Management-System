<?php

namespace App\Http\Controllers;

use App\Models\Expances;
use Illuminate\Http\Request;

class ExpancesController extends Controller
{
    
    public function index()
    {
        $expances = Expances::all();
        $expances = $expances->sortByDesc('id');
        return view('Expances-page')->with('expances', $expances);
    }
 
    public function report()
    {
        $expances = Expances::all();
        $expances = $expances->sortByDesc('id');
        return view('ExpensesReport')->with('expances', $expances);
    }
    public function edit($id)
    {
        $expances = Expances::findOrFail($id);

        return view('expancesupdate', compact('expances'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'E_Name' => 'required|string',
            'E_Descriptio' => 'required|string',
            'E_Amount' => 'required|numeric'
        ]);

        // Find the Customer record and update it
        $expances = Expances::findOrFail($id);
        $expances->update($validatedData);

        return redirect('/expances')->with('success', 'Expanses updated successfully');
    }

    public function destroy($id)
    {
        $customer = Expances::findOrFail($id);
        $customer->delete();

        return redirect('/expances')->with('success', 'Expanses Delete successfully');
    }

}
