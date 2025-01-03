<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::paginate(5);
        $categories = Category::all();

        return view('pages.product.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('pages.product.create', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required',

        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $imagepath = $request->file('image')->store('product_images', 'public');
                $validated['image'] = $imagepath;
            }
            $validated['slug'] = Str::slug($request->name);
            $newvalidated = Product::create($validated);



            $newvalidated->Category()->attach($request->category);
            DB::commit();
            return redirect()->route('product.index')->with(key: 'added', value: true);
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
    public function show(Product $product)
    {
        $products = Product::findOrFail($product->id);
        // ->Category()->paginate(3);
        $categories = Category::all();
        // $product = Product::paginate(5);
        // ->findOrFail(1);
        // $product = Product::find($product->id);
        // $product = DB::table('products')->where('id', $product->id)->first();
        return view('pages.product.details', [

            'products' => $products,
            'categories' => $categories

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        $products = Product::findOrFail($product->id);
        $categories = Category::all();
        // return $products;
        return view('pages.product.edit', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required',

        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $imagepath = $request->file('image')->store('product_images', 'public');
                $validated['image'] = $imagepath;
            }
            $validated['slug'] = Str::slug($request->name);
            // $newvalidated = Product::create($validated);
            $product->update($validated);



            $product->Category()->attach($request->category);
            DB::commit();
            return redirect()->route('product.index')->with(key: 'added', value: true);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->Category()->detach();
        Storage::disk('public')->delete($product->image);
        return redirect()->back();
    }
}
