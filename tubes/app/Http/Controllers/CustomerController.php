<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:15',
            'booking_date' => 'nullable|date',
            'laptop_brand' => 'nullable|string|max:255',
            'laptop_type' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email,' . $id,
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255', // Tambahkan ini
        'booking_date' => 'nullable|date',
        'laptop_brand' => 'nullable|string|max:255',
        'laptop_type' => 'nullable|string|max:255',
        'service_type' => 'nullable|string|max:255',
        'notes' => 'nullable|string|max:1000',
    ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->booking_date = $request->booking_date;
        $customer->laptop_brand = $request->laptop_brand;
        $customer->laptop_type = $request->laptop_type;
        $customer->service_type = $request->service_type;
        $customer->notes = $request->notes;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Logic to delete a customer
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
