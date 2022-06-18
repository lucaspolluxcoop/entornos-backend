<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyPropertyPublicServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_property_public_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_public_service_id');
            $table->foreignId('property_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreign('property_public_service_id', 'pps_id_foreign')
                ->references('id')
                ->on('property_public_services')
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
        Schema::dropIfExists('property_property_public_services');
    }
}
