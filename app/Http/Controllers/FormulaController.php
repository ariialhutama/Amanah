<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use App\Models\formula;
use App\Models\MaterialProduct;
use Illuminate\Http\Request;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materialProduct = MaterialProduct::all();
        // $brandProduct = BrandProduct::all();
        $formula = formula::paginate(5);
        return view('pages.formula.index',[
            'formula' => $formula,
            // 'brandProduct' => $brandProduct,
            'materialProduct' => $materialProduct,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.formula.create');
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
    public function show(formula $formula)
    {
        //
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

        return redirect()->back();
    }
}
