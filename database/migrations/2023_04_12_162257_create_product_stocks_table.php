<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('stock_id');

            $table->foreign('product_id','product_stock_product_fk')->on('products')->references('id');
            $table->foreign('stock_id','product_stock_stock_fk')->on('stocks')->references('id');;

            $table->index('product_id','product_stock_product_idx');
            $table->index('stock_id','product_stock_stock_idx');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
