<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('sirketadi');
            $table->string('vergidairesi');
            $table->string('vergino');
            $table->text('adres');
            $table->string('odemesekli');
            $table->string('subtotal');
            $table->string('tax');
            $table->string('total');
            $table->string('durum')->default('beklemede');
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
        Schema::dropIfExists('orders');
    }
}
