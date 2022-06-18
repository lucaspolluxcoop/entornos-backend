<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtintionFieldsToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('reason');
            $table->string('other_reason')->nullable();
            $table->boolean('finished_contract')->nullable();
            $table->foreignId('extintion_reason_id')
                ->nullable()
                ->constrained()
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
            $table->string('reason')->nullable();
            $table->dropColumn('finished_contract');
            $table->dropColumn('other_reason');
            $table->dropForeign('contracts_extintion_reason_id_foreign');
            $table->dropColumn('extintion_reason_id');
        });
    }
}
