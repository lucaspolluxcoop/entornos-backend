<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtintionToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->date('extintion_date')->nullable();
            $table->string('reason')->nullable();
            $table->boolean('renewed_contract')->nullable();
            $table->boolean('extended_contract')->nullable();
            $table->foreignId('previous_contract_id')
                ->nullable()
                ->constrained('contracts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('extintion_date');
            $table->dropColumn('reason');
            $table->dropColumn('renewed_contract');
            $table->dropColumn('extended_contract');
            $table->dropForeign('contracts_previous_contract_id_foreign');
            $table->dropColumn('previous_contract_id');
        });
    }
}
