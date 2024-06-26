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
        Schema::create(
            'reviews',
            function (Blueprint $table) {
                $table->id();

                $table->string('name');
                $table->text('text');
                $table->integer('rating')->unsigned();
                $table->string('email')->nullable();
                $table->string('status', 20)->default('Новая');

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
