<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            //PURCHASE INFOS
            $table->decimal('total_price', 20, 2);
            $table->longText('menus');

            //SHIPPING INFOS
            $table->string('phone')->nullable();
            $table->string('address', 255);

            //PAYMENT METHOD
            $table->enum('payment_method', ['Money', 'Pix', 'Credit Card', 'Debit Card']);

            //OWNER ORDER
            $table->foreignIdFor(User::class, 'created_by');

            //STATUS SHIPPING
            $table->enum('status', ['Received', 'Production', 'Delivery'])->nullable();

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
};
