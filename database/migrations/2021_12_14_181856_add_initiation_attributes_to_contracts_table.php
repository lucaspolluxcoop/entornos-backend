<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInitiationAttributesToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->date('start_contract');
            $table->date('expires')->change();
            $table->renameColumn('expires','end_contract');
            $table->softDeletes();
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
            $table->dropColumn('start_contract');
            $table->string('end_contract')->change();
            $table->renameColumn('end_contract','expires');
            $table->dropSoftDeletes();
        });
    }
}
