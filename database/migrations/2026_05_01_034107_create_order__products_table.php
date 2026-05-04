<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('order__products', function (Blueprint $table) {

        $table->id();

        // Relaciones 
        $table->foreignId('order_id')->constrained()->onDelete('cascade');
        $table->foreignId('product_id')->constrained()->onDelete('cascade');

        // Campos específicos de la tabla 
        $table->integer('quantity'); // Cantidad de productos comprados
        $table->decimal('price', 10, 2); // Precio unitario al momento de la venta
        $table->decimal('subtotal', 10, 2); // Resultado de quantity * price

        $table->softDeletes();
        $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('order__products');
    }
};
