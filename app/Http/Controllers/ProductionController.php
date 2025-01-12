<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Formula;
use App\Models\Material;
use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;

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
        $brand=Brand::all();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
