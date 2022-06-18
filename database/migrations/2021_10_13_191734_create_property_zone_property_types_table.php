<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyZonePropertyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_zone_property_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_zone_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('property_type_id')
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('property_zone_property_types');
    }
}
