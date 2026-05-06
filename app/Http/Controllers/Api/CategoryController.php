<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category; // <-- Importante que el nombre de la tabla este bien escrito como el archivo
use App\Http\Requests\StoreCategoryRequest; //<-- El nombre es igual al del archivo category dentro de Requests (crear) 
use App\Http\Requests\UpdateCategoryRequest;// <-- El nombre es igual al del archivo category dentro de Requests (actualizar)
use App\Http\Resources\CategoryResource; // <-- El nombre es igual al del archivo category dentro de Resources (recurso)
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Usamos 'products' porque una categoría TIENE MUCHOS productos indica la relacion que hay  entre las tablas
    //$categories = Category::with('products')->get(); <-- Esto carga las categorías junto con sus productos relacionados -->
    $categories = Category::all(); // Solo trae las categorías, sin productos.
    
    return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage. (crear)
     */
    public function store(StoreCategoryRequest $request) // <-- El nombre debe ser igual al archivo de category dentro de Request para crear
    {
        $category = Category::create($request->validated());
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource. (mostrar los registros)
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage. (actualizar)
     */
    public function update(UpdateCategoryRequest $request, string $id)//<-- El nombre en verde debe ser igual al archivo de category
    // dentro de Request para actualizar ,puede ser un error esto
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'La categoría "' .$category->name . '"ha sido eliminada correctamente'
        ], 200);// el 200 signfica ok
    }
}
