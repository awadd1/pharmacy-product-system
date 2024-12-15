<?php

namespace App\Http\Controllers\Api; 
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    public function index()
    {
        return Pharmacy::all();
    }

    public function store(Request $request)
    {
        $pharmacy = Pharmacy::create($request->all());
        return response()->json($pharmacy, 201); 
    }

    public function update(Request $request, $id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->update($request->all());
        return response()->json($pharmacy, 200); 
    }

    public function destroy($id)
    {
        Pharmacy::destroy($id);
        return response()->json(null, 204);
    }
}