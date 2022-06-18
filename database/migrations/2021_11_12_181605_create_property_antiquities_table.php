<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyAntiquitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_antiquities', function (Blueprint $table) {
            $table->id();
            $table->integer('antiquity');
            $table->boolean('delivered_painted');
            $table->foreignId('property_maintenance_state_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('property_conservation_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('property_termination_id')
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
        Schema::dropIfExists('property_antiquities');
    }
}
