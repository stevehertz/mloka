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
        Schema::create('percels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id'); // send from 
            $table->unsignedBigInteger('customer_id'); // send to 
            $table->unsignedBigInteger('product_id'); // product to send
            $table->string('location')->nullable(); //send location
            $table->string('deposit_locker')->nullable(); //Locker to deposit
            $table->string('receiving_locker')->nullable(); // Receiving Locker
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->uuid('uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percels');
    }
};
