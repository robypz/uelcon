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


        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('statement_id')->constrained();
            $table->decimal('debt');
            $table->string('term');
            $table->date('expiration_date')->nullable()->default(null);
            $table->date('approval_date')->nullable()->default(null);
            $table->date('disbursement_date')->nullable()->default(null);
            $table->decimal('gross_amount');
            $table->decimal('flat_commission');
            $table->decimal('net_amount');
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained();
            $table->boolean('confirmed')->default(false);
            $table->date('confirmation_date')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('loans');
    }
};
