<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Product extends Model
{
    /** @use HasFactory<\Database\Factories\OrderProductFactory> */
    use HasFactory, SoftDeletes;

    // 1. Definimos la tabla (Laravel por defecto buscaría order__products con doble guion)
    protected $table = 'order__products';

    // 2. Campos que permitimos llenar desde el Controlador (Mass Assignment)
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal'
    ];

    /**
     * Relación con la Orden: Muchos registros de productos pertenecen a una Orden
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Relación con el Producto: Cada línea de la tabla pertenece a un Producto
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
