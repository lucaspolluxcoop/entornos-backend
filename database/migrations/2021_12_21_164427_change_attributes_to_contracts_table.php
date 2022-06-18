<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAttributesToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('premium');
            $table->string('contract_identifier')->nullable()->unique();
            $table->foreignId('contract_locative_canon_id')
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
            $table->float('premium');
            $table->dropForeign('contracts_contract_locative_canon_id_foreign');
            $table->dropColumn('contract_locative_canon_id');
        });
    }
}
