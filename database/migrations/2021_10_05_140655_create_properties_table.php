<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('number');
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->string('neightbourhood')->nullable();
            $table->string('zip');
            $table->integer('property_identifier')->nullable();
            $table->string('owner_tax_id');
            $table->integer('area')->nullable();
            $table->foreignId('property_type_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('city_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('property_zone_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
