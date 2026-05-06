<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Importante para la relación
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory; 
    // si no se agrega filliable laravel ignorara los campos que quiera insertar o actualizar y no se guardara en mi bd
        protected $fillable = [
            'name',
            'slug',
            'description',
            'is_visible'
    ];
    /**
     * 2. Relación: Una categoría TIENE MUCHOS productos
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
