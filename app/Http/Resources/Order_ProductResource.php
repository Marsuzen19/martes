<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order_ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
        'id'                => $this->id,
        
        // IDs técnicos (Fundamentales para lógica de programación)
        'order_id'          => $this->order_id,
        'product_id'        => $this->product_id,
        
        // Datos de la tabla intermedia
        'cantidad'          => $this->quantity,
        'precio_unitario'   => $this->price,
        'subtotal'          => $this->subtotal,
        
        // Información descriptiva (Para que el usuario entienda qué ve)
        'nombre_producto'   => $this->product->name ?? 'No disponible',
        'numero_orden'      => $this->order->order_number ?? 'N/A',
        
        // Auditoría
        'created_at'        => $this->created_at,
        'updated_at'        => $this->updated_at
        ];
    }
}
