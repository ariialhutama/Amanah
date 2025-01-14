<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Formula;
use App\Models\Material;
use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Formula $formula, Material $material)
    {
        // $material=Material::findOrFail($material->id);
        $formulas = Formula::all();
        $materials = Material::all();
        $product = Product::all();
        $brand = Brand::all();
        $Production = Production::all();
        // $formula = Formula::findOrFail($formula->id);
        return view('pages.production.listProduction.index', [
            'materials' => $materials,
            'formulas' => $formulas,
            'products' => $product,
            'brands' => $brand,
            'productions' => $Production

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::all();
        $product = Product::all();

        return view('pages.production.listProduction.create', [
            'brands' => $brand,
            'products' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required',
            'packaging' => 'required',
            'content_weight' => 'required',
            'status' => 'required',
            'production_date' => 'required|string',
        ]);
        list($starDate, $endDate) = explode(' - ', $validated['production_date']);
        $validated['start_date'] = $starDate;
        $validated['end_date'] = $endDate;
        // dd($validated);
        DB::beginTransaction();
        try {
            $newvalidated = Production::create($validated);
            DB::commit();
            return redirect()->route('production.index')->with(key: 'added', value: true);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Production $Production)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $Production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $Production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $Production)
    {
        //
    }
}
