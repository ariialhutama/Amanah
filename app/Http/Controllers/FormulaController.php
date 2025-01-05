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
        $formula = Formula::paginate(5);
        return view('pages.formula.index',[
            'formula' => $formula,
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
        return view('pages.formula.create',[
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
        $total = 0;
        $total = $formula->Material->sum('concentration');
        $total_amount = $formula->Material->sum('concentration') / 100;

        $pot = $request->pot;
        $sub_amount = $request->sub_amount;
        // $hitung = $pot * ($formula->Material->concentration)/100;
        // $hitung = $request->pot * ($formula->Material->concentration)/100;
               
        return view('pages.formula.detail', [

            'formulas' => $formulas,
            'total' => $total,
            'total_amount' => $total_amount,
            // 'hitung' => $hitung


        ]);
    }

    public function amount(Request $request, Formula $formula){
        $pot = $request->pot;
        $sub_amount = $request->sub_amount;
        
        $hitung = $pot * $sub_amount;
        return view('pages.formula.detail')
        ->with('hitung', $hitung)
        ->with('pot', $pot)
        ->with('sub_amount', $sub_amount);

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(formula $formula)
    {
        //
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
