<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('categories_id');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->text('content');
            $table->string('stock_no');
            $table->decimal('sale_price',2);
            $table->decimal('regular_price',2);
            $table->decimal('price')->nullable();
            $table->string('stock');
            $table->integer('tax');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
