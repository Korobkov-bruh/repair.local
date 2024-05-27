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
            'offices',
            function (Blueprint $table) {
                $table->id();

                $table->string('name', 20);
                $table->string('address', 255);
                $table->string('phone', 20)->nullable();
                $table->text('hours');
                $table->string('social', 255)->nullable();
                $table->text('map')->nullable();

                // $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
