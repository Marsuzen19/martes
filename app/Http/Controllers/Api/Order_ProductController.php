<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order_Product; // Nombre correcto según tu archivo
use App\Http\Requests\StoreOrder_ProductRequest;
use App\Http\Requests\UpdateOrder_ProductRequest;
use App\Http\Resources\Order_ProductResource; // Nombre correcto con guion bajo
use Illuminate\Http\Request;

class Order_ProductController extends Controller
{
    public function index()
    {
        // CAMBIO: Usamos Order_Product (con guion bajo)
        $items = Order_Product::with(['order', 'product'])->get();
        return Order_ProductResource::collection($items);
    }

    public function store(StoreOrder_ProductRequest $request)
    {
        $data = $request->validated();
        $data['subtotal'] = (float)$data['quantity'] * (float)$data['price'];

        // CAMBIO: Usamos Order_Product
        $item = Order_Product::create($data);

        return new Order_ProductResource($item);
    }

    public function show(string $id)
    {
        // CAMBIO: Usamos Order_Product
        $item = Order_Product::with(['order', 'product'])->findOrFail($id);
        return new Order_ProductResource($item);
    }

    public function update(UpdateOrder_ProductRequest $request, string $id)
    {
        // CAMBIO: Usamos Order_Product
        $item = Order_Product::findOrFail($id);
        $item->update($request->validated());
        
        return new Order_ProductResource($item);
    }

    public function destroy(string $id)
    {
        // CAMBIO: Usamos Order_Product
        $item = Order_Product::with(['product', 'order'])->findOrFail($id);
        
        $productName = $item->product->name ?? 'Producto';
        $orderNumber = $item->order->order_number ?? 'Orden';

        $item->delete();

        return response()->json([
            'status' => 'success',
            'message' => "Se eliminó '{$productName}' de la orden {$orderNumber} exitosamente."
        ], 200);
    }
}