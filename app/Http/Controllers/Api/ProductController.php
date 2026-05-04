<?php

namespace App\Http\Controllers\Api;

/* agregue 4 lineas de codigo en esta parte que son:
use App\Models\Product hasta App\Http\Resources\ProductResource
*/
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //es el unico que la variable es distinta a las otras porque no es parte del crud
    public function index()
    {
    
    //Agregue estas dos lineas de codigo
    // En el método index//
    $products = Product::with('category')->get();
    return ProductResource::collection($products);

    }

    /**
     * Store a newly created resource in storage.
     */

    //Crear nuevo producto
    public function store(StoreProductRequest $request)
    {

    // Agregue dos lineas de codigo
    $product = Product::create($request->validated());
    return new ProductResource($product);

    }

    /**
     * Display the specified resource.
     */

    // Mostrar los productos
    public function show(string $id)
    {
    
    //Agregue dos lineas de codigo
    $product = Product::findOrFail($id);
    return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */

    //Actualizar
    public function update(StoreProductRequest $request, string $id)
    {
    
    //Agregue 3 lineas de codigo
    $product = Product::findOrFail($id);
    $product->update($request->validated());
    return new ProductResource($product);

    }

    /**
     * Remove the specified resource from storage.
     */

    //Eliminar
    public function destroy(string $id)
    {
    
    //Agregue 3 lineas de codigo
    $product = Product::findOrFail($id);
    $product->delete();
    return response()->json([
        'res' => true,
        'message' => 'Producto eliminado con éxito'
    ], 200);
     //dice que fue exitosa la eliminacion

    }
}
