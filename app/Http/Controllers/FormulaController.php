<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use App\Models\Formula;
use App\Models\Material;
use App\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'materials.*' => 'string',
            'materials' => 'required|array'
        ]);


        $formula = Formula::create($data);
        $materials = collect($request->input('materials', []))->map(function ($material) {
            return ['concentration' => $material];
        });

        $formula->Material()->sync($materials);
        // $formula->Material()->sync($this->mapMaterials($data['materials']));

        return redirect()->route('formula.index');
    }

    public function mapMaterials($materials)
    {
        return collect($materials)->map(function ($i) {
            return ['concentration' => $i];
        });
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //     ]);
    //     DB::beginTransaction();
    //     try {

    //         $newvalidated = Formula::create($validated);

    //         $newvalidated->Material()->attach($request->material);
    //         DB::commit();
    //         return redirect()->route('formula.index')->with(key: 'added', value: true);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         $error = ValidationException::withMessages([
    //             'system_error' => ['System error!' . $e->getMessage()],
    //         ]);
    //         throw $error;
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Formula $formula, Request $request)
    {
        $formulas = Formula::findOrFail($formula->id);
        $materials = Material::all();
        // $total = 0;
        // $materials = Material::findOrFail($materials->id);
        $materials = Material::all();

        // $data = $formula->Material->sum('concentration');
        // $total = $materials->Formula->sum(function ($formulas) {
        //     return $formulas->pivot->sum('concentration');
        // });
        $total = $formulas->Material->sum(function ($materials) {
            return $materials->pivot->concentration;
        });
        $total_amount = $formulas->Material->sum(function ($materials) {
            return $materials->pivot->concentration / 100;
        });

        // $total_amount = $formula->pivot->sum('concentration') / 100;

        return view('pages.formula.detail', [
            'formulas' => $formulas,
            'total' => $total,
            'total_amount' => $total_amount,
            'materials' => $materials

        ]);
    }



    /**

     * Show the form for editing the specified resource.
     */
    public function edit(Formula $formula)
    {
        // abort_if(
        //     Gate::denies('formula_edit'),
        //     HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        // $formula->load('Material');

        $materials = Material::get()->map(function ($material) use ($formula) {
            $material->value = data_get($formula->Material->firstWhere('id', $material->id), 'pivot.concentration') ?? null;
            return $material;
        });

        return view('pages.formula.edit', [
            'formula' => $formula,
            'materials' => $materials
        ]);
    }
    // public function edit(Formula $formula)
    // {
    //     $formulas = Formula::all();
    //     $materials = Material::all();
    //     $formulas = Formula::findOrFail($formula->id);
    //     $formula_materials = $formulas->Material->pluck('id')->toArray();
    //     return view('pages.formula.edit', [
    //         'formulas' => $formulas,
    //         'materials' => $materials,
    //         'formula_materials' => $formula_materials
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function updateShow(Request $request, Formula $formula)
    {
        $data = $request->validate([
            // 'name' => 'required|string|max:255',
            'materials.*' => 'string',
            'materials' => 'required|array'
        ]);


        $formula->update($data);
        $formula->Material()->sync($this->mapMaterials($data['materials']));


        // $formula->Material()->sync($this->mapMaterials($data['materials']));

        return redirect()->route('formula.index');
    }
    public function update(Request $request, Formula $formula)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'materials.*' => 'string',
            'materials' => 'required|array'
        ]);


        $formula->update($data);
        $formula->Material()->sync($this->mapMaterials($data['materials']));


        // $formula->Material()->sync($this->mapMaterials($data['materials']));

        return redirect()->route('formula.index');
    }
    // public function update(Request $request, Formula $formula)
    // {
    //     $validated = $request->validate([
    //         'material' => 'required|exists:materials,id',
    //         'concentration' => 'required',
    //     ]);

    //     $material = Material::find($validated['material']);

    //     $material->Formula()->updateExistingPivot($validated['material'], [
    //         'concentration' => $validated['concentration']

    //     ]);


    //     return redirect()->route('formula.show')->with(key: 'added', value: true);
    // }

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
