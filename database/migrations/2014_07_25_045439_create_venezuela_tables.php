<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVenezuelaTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('states', function(Blueprint $table)
	    {
	        $table->id('id');
	        $table->string('state');
	        $table->string('iso_3166-2');
            $table->timestamps();
	    });

	    Schema::create('townships', function(Blueprint $table)
	    {
	        $table->id('id');
            $table->foreignId('state_id')->constrained();
	        $table->string('township');
            $table->timestamps();

	    });

	    Schema::create('cities', function(Blueprint $table)
	    {
	        $table->id('id');
            $table->foreignId('state_id')->constrained();
	        $table->string('city');
	        $table->tinyInteger('capital');
            $table->timestamps();

	    });

	    Schema::create('parishes', function(Blueprint $table)
	    {
	        $table->id('id');
            $table->foreignId('township_id')->constrained();
	        $table->string('parish');
            $table->timestamps();

	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estados');
		Schema::drop('municipios');
		Schema::drop('ciudades');
		Schema::drop('parroquias');
	}

}
