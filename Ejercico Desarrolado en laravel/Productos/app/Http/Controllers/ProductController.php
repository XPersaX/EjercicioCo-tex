<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\SaveProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
   
    // public function __construct() {
    //     $this->middleware('auth',['except' => ['index','show']]);

    // }
    public function index()
    {
        $product = Product::get();
        return view('products.index',['product' => $product]);
    }


    public function store(SaveProductRequest $request)
    {
        Product::create($request->validated());

        return to_route('product.index')->with('status','Producto creado con exito');
    }

    public function show(Product $product)
    {
        return view('products.show',['product' => $product]);
    }

    public function create()
    {
        return view('products.create',['product' => new Product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit',['product' => $product]);
    }

    public function update(SaveProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return to_route('product.show',$product)->with('status','Producto Editado con exito');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index')->with('status','Producto Eliminado con exito');
    }
}
