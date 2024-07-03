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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('reference_place');
            $table->foreignId('parish_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->morphs('addressable');
            $table->timestamps();
        });



        /*Schema::create('parish_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parish_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->timestamps();
        });

        Schema::create('city_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
        //Schema::dropIfExists('parish_address');
        //Schema::dropIfExists('city_address');
    }
};
