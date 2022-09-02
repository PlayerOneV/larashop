<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Enviamos todos los productos a la vista
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirigimos a la vista que muestra el form para crear un producto
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //El producto no debe estar disponible si tiene stock 0
        if ($request->status && $request->stock == 0) {
            return redirect()->back()->withInput($request->all())
                ->withErrors('If the product is available must have stock');
        }
        //Almacenamos el nuevo producto en la bd
        /* Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'status' =>$request->input('status')
        ]); */
        //session()->forget('error');
        Product::create($request->all());
        //return redirect()->back(); regresa a la vista update
        return redirect()->route('products.index')->with(['success' => "The product {$request->title} was created successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //Regresamos el producto especifico a la vista
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Regresamos la vista que muestra el form para editar un producto
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        //El producto no debe estar disponible si tiene stock 0
        if ($request->status && $request->stock == 0) {
            return redirect()->back()->withInput($request->all())
                ->withErrors('If the product is available must have stock');
        }

        //Actualizamos un producto en la bd
        $product = Product::findOrFail($id);
        $product->update($request->all());

        //return redirect()->route('products.index');
        return redirect()->route('products.edit', ['product' => $id])
            ->with(['success' => "The product {$request->title} was updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminamos un producto de la base de datos
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with(['success' => "The product {$product->title} was deleted successfully"]);
    }
}
