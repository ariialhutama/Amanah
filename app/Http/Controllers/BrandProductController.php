<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brandProduct = BrandProduct::paginate(5);
        return view('pages.brand.index', [
            'brand_products' => $brandProduct,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BrandProduct $brandProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandProduct $brandProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandProduct $brandProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrandProduct $brandProduct)
    {
        //
        $brandProduct->delete();

        return redirect()->back();
    }
}
