<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Prikazi sve resurse (sve proizvode)
     */
    public function index(Request $request)
    {

        $categories = Category::all();
        $types = CategoryType::all();



        $search = $request->get('q'); // Search term
        $type = $request->get('t'); // Category type
        $category = $request->get('c'); // Category name

        // Start building the base query
        $baseQuery = Product::orderBy("created_at", "DESC");

        // If there's a search term, add it to the query
        if (!empty($search)) {
            $baseQuery->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('desc', 'LIKE', "%{$search}%");
            });
        }

        // If a category name is provided, filter by it
        if (!empty($category)) {
            $baseQuery->where('category_id', $category);
        }

        if(!empty($type)) {
            $baseQuery->where('product_type', $type);
        }


        // Execute the query and paginate the results
        $products = $baseQuery->paginate(15)->withQueryString();

        return view('products.index', compact('products', 'categories', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     * Prikazi formu za kreiranje resursa (proizvoda)
     */
    public function create()
    {
        $categories = Category::all();
        $types = CategoryType::all();
        return view('products.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     * Ruta za zahtev kreiranja proizovda
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'desc' => 'required|string',
                'price' => 'required|integer',
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048'
            ]);

            $img = time().'.'.$request->file('image')->extension();
            $request->image->storeAs("public/images/products/", $img);
            $product = Product::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'price'=> $request->price,
                'category_id' => $request->category,
                'product_type' => $request->type,
                'img'=> $img
            ]);

            $product->save();

            return redirect()->route('admin.products')->with('success','Product saved');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * Prikazivanje resursa (proizvoda sa ID-em $id) - npr stranica gde se vidi proizvod i detalji o njemu
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        return view('products.show', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     * Prikazivanje forme za editovanje resursa (edit proizvod)
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * Ruta za zahtev za editovanje proizvoda
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        $product->save();
        return redirect()->route('admin.products')->with('success', 'Product edited');
    }

    /**
     * Remove the specified resource from storage.
     * Ruta za brisanje proizvoda (sa id-em $id) iz baze
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->back()->with('success', 'Deleted');
    }
}
