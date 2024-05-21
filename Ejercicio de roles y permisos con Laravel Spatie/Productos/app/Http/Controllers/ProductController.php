<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\SaveProductRequest;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        //Protejer las rutas
        $this->middleware('can:superadmin.product.index')->only('index');
        $this->middleware('can:superadmin.product.create')->only('create','store');
        $this->middleware('can:superadmin.product.edit')->only('edit','update');
        $this->middleware('can:superadmin.product.show')->only('show');
        $this->middleware('can:superadmin.product.destroy')->only('destroy');
    }

    //Metodo para  mostrar la lista de productos
    public function index()
    {
        $product = Product::get();
        return view('products.index',['product' => $product]);
    }

    //Metodo para  mostrar la vista para registrar un poroducto
    public function create()
    {
        return view('products.create',['product' => new Product]);
    }

    //Metodo para registrar el producto
    public function store(SaveProductRequest $request)
    {
        Product::create($request->validated());

        return to_route('product.index')->with('status','Producto creado con exito');
    }

    //Metodo para  mostrar vista para ver  los datos del producto
    public function show(Product $product)
    {
        return view('products.show',['product' => $product]);
    }


    //Metodo para  mostrar vista para editar los datos del usuario
    public function edit(Product $product)
    {
        return view('products.edit',['product' => $product]);
    }

    //Metodo para  editar un usuario
    public function update(SaveProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return to_route('product.show',$product)->with('status','Producto Editado con exito');

    }

    //Metodo para  elminar un usuario
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index')->with('status','Producto Eliminado con exito');
    }
}
