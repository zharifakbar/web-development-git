<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use function Laravel\Prompts\progress;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $data=[];
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request-> validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
        Product::create($request->post());
        return redirect()->route('product.index')->with ('success', 'produk berhasil di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [];
        $data ['products'] = Product::findOrFail($id);
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request,  $id)
    {
        {
            $request-> validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
            ]);
            $query = Product::findOrFail($id);
            $query->update($request->all());
            return redirect()->route('product.index')->with ('success', 'produk berhasil di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('success', 'produk berhasil di hapus');
    }   
}
