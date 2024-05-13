<?php

use App\Enums\GeneralStatus;
use App\Enums\ProductSizeUnits;
use App\Enums\ProductWeightUnits;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->nullable()->default(GeneralStatus::ACTIVE);
            $table->decimal('weight', 10, 2)->nullable();
            $table->tinyInteger('weigh_unit')->default(ProductWeightUnits::KG)->nullable();
            $table->decimal('length', 8, 2)->nullable(); // Assuming precision of 8 digits and scale of 2
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->tinyInteger('size_unit')->default(ProductSizeUnits::CM)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->uuid('uuid');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
