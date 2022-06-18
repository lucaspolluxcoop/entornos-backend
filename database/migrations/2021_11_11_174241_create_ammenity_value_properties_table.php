<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmmenityValuePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ammenity_value_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ammenity_value_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('property_id')
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
        Schema::dropIfExists('ammenity_value_properties');
    }
}
