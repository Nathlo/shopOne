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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('category_id')->onDelete('cascade');

            // $table->foreign('user_id')
            //         ->references('id')
            //         ->on('users')
            //         ->onDelete('cascade');
            
            // $table->foreign('category_id')
            //         ->references('id')
            //         ->on('categories')
            //         ->onDelete('cascade');
           
            $table->string('name', 60)->unique();
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->string('image', 255)->nullable();
            $table->tinyInteger('in_stock')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
