<?php

namespace App\Http\Controllers;

use App\Models\BrandsProduct;
use Illuminate\Http\Request;

class BrandsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

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
        // $validated = $request->validate([
        //     'name' => 'required',
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BrandsProduct $brandProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BrandsProduct $brandProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandsProduct $brandProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BrandsProduct $brandProduct)
    {
        //

    }
}
