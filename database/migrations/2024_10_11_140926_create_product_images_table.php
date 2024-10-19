<?php

use App\Models\Product;
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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('path_sm', 200)->nullable(false);
            $table->string('path_lg', 200)->nullable(false);
            $table->string('url_sm', 200)->nullable(false);
            $table->string('url_lg', 200)->nullable(false);
            $table->string('width_sm', 20)->nullable(false);
            $table->string('width_lg', 20)->nullable(false);
            $table->string('height_sm', 20)->nullable(false);
            $table->string('height_lg', 20)->nullable(false);
            $table->integer('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
