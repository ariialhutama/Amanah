<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use App\Models\Formula;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $material = Material::all();
        // $brandProduct = BrandProduct::all();
        $formulas = Formula::paginate(5);
        return view('pages.formula.index', [
            'formulas' => $formulas,
            // 'brandProduct' => $brandProduct,
            'material' => $material,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $formulas = Formula::all();
        $materials = Material::all();
        return view('pages.formula.create', [
            'products' => $formulas,
            'materials' => $materials
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        DB::beginTransaction();
        try {

            $newvalidated = Formula::create($validated);

            $newvalidated->Material()->attach($request->material);
            DB::commit();
            return redirect()->route('formula.index')->with(key: 'added', value: true);
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
    public function show(formula $formula, Request $request)
    {
        $formulas = Formula::findOrFail($formula->id);
        $materials = Material::all();
        $total = 0;
        // $total = $formula->Material->sum('concentration');


        // $total = $formula->pivot->sum('concentration') ?: 0;
        $total = $formula->Material->sum(function ($materials) {
            return $materials->pivot->sum('concentration') ?? 0;
        });
        $total_amount = $formula->Material->sum(function ($materials) {
            return $materials->pivot->sum('concentration') / 100 ?? 0;
        });

        // $total_amount = $formula->pivot->sum('concentration') / 100;

        return view('pages.formula.detail', [
            'formulas' => $formulas,
            'total' => $total,
            'total_amount' => $total_amount,

        ]);
    }

    /**

     * Show the form for editing the specified resource.
     */
    public function edit(formula $formula)
    {
        $formulas = Formula::all();
        $materials = Material::all();
        $formulas = Formula::findOrFail($formula->id);
        $formula_materials = $formulas->Material->pluck('id')->toArray();
        return view('pages.formula.edit', [
            'formulas' => $formulas,
            'materials' => $materials,
            'formula_materials' => $formula_materials
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, formula $formula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(formula $formula)
    {
        //
        $formula->delete();
        $formula->Material()->detach();
        return redirect()->back();
    }
}
