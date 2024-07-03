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

        Schema::create('personal_reference_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('personal_references', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('dni');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('personal_reference_type_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_reference_types');
        Schema::dropIfExists('personal_references');
    }
};
