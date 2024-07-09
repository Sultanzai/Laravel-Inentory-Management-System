<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('Company-page')->with('company',$company);
    }
<<<<<<< HEAD
    
    public function Report()
    {
        $company = Company::all();
        return view('CompanyReport')->with('company',$company);
    }
    
=======
>>>>>>> 5f6be0a9118c740d2be776789a2d39bc2c44e702
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect('/Company-page')->with('success', 'Order Deleted successfully');
    }
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('Update-company', compact('company'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'C_Name' => 'required|string',
            'C_Phone' => 'required|string',
            'C_Description' => 'required|string',
            'C_Amount' => 'required|integer',
            'C_Status' => 'required|string',
            'C_Type' => 'required|string'
        ]);

        // Find the payment record and update it
        $company = Company::findOrFail($id);
        $company->update($validatedData);

        return redirect('/Company-page')->with('success', 'Company bill updated successfully');
    }
}
