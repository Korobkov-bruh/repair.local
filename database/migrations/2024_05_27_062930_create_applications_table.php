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
            'applications',
            function (Blueprint $table) {
                $table->id();

                $table->string('model', 255);
                $table->text('fault');
                $table->string('customer', 255);
                $table->string('status', 20);
                $table->date('completion')->nullable();

                $table->timestamps();

                $table->unsignedBigInteger('user_id');

                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
