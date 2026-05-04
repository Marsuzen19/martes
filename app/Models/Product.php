<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importante: Agrégalo si usas SoftDeletes en tu migración

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes; // Activa las fábricas y el borrado lógico

    // 1. Atributos asignables (Fillable)
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'sku',
        'stock',
        'price',
        'is_active'
    ];

    // 2. Conversión de tipos (Casts)
    // Esto asegura que al recibir datos de la DB, Laravel los trate como el tipo correcto
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    // 3. Relaciones (Relationships)
    /**
     * Obtiene la categoría a la que pertenece el producto.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}