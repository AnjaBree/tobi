<?php

namespace App\Http\Controllers;
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
        $query = $request->get('q');

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('desc', 'LIKE', "%{$query}%")
                ->orderBy("created_at", 'DESC')
                ->paginate(15)->withQueryString();
        } else {
            $products = Product::orderBy("created_at", 'DESC')->paginate(15)->withQueryString();
        }
        // $products = Product::orderBy("created_at", 'DESC')->paginate(15);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * Prikazi formu za kreiranje resursa (proizvoda)
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     * Ruta za zahtev kreiranja proizovda
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048'
            ]);
    
            $img = time().'.'.$request->file('image')->extension();
            $request->image->storeAs("public/images/products/", $img);
            $product = Product::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'price'=> $request->price,
                'img'=> $img
            ]);

            $product->save();
    
            return redirect()->route('products.index')->with('success','Product saved');
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
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     * Ruta za zahtev za editovanje proizvoda
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Ruta za brisanje proizvoda (sa id-em $id) iz baze
     */
    public function destroy(string $id)
    {
        //
    }
}
