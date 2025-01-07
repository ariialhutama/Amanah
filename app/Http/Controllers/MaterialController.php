<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $material = Material::paginate(5);
        return view('pages.production.material.index', [
            'material_products' => $material,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.production.material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required',
            // 'concentration' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $newValidate = Material::create($validate);
            DB::commit();
            return redirect()->route('material.index');
        } catch (\Throwable $e) {
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
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->back();
        // try {
        //     $material->delete();
        //     return redirect()->back();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     $error = ValidationException::withMessages([
        //         'system_error' => ['System error!', $e->getMessage()],
        //     ]);
        //     throw $error;
        // }
    }
}
