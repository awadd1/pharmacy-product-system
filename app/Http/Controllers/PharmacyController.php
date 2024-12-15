<?php

namespace App\Http\Controllers;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return view('pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        return view('pharmacies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        Pharmacy::create($request->only(['name', 'address']));
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy added successfully!');
    }

    public function edit($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        return view('pharmacies.edit', compact('pharmacy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $pharmacy = Pharmacy::findOrFail($id); 
        $pharmacy->update($request->only(['name', 'address'])); 
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy updated successfully!');
    }

    public function destroy($id)
    {
        $pharmacy = Pharmacy::findOrFail($id); 
        $pharmacy->delete();
        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy deleted successfully!');
    }

    public function show($id)
    {
        $pharmacy = Pharmacy::with('products')->findOrFail($id);
        return view('pharmacies.show', compact('pharmacy'));
    }
}