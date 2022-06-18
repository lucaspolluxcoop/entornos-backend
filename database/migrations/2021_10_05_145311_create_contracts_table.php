<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('expires');
            $table->float('premium');
            $table->foreignId('property_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('contract_type_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('owner_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('tenant_id')
                ->constrained('users')
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
        Schema::dropIfExists('contracts');
    }
}
