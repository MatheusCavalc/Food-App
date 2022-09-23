<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shoppingcarts', function (Blueprint $table) {
            $table->enum('status', ['pending', 'in_process', 'success', 'error'])->default('pending');
            $table->string('payment_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('status_delivery', ['Recebido', 'Producao', 'Entrega', 'Entregue'])->default('Recebido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shoppingcarts', function (Blueprint $table) {
            //
        });
    }
};
