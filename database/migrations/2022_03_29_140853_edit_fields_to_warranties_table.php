<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditFieldsToWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranties', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('file_path');
            $table->foreignId('contract_id')
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
        Schema::table('warranties', function (Blueprint $table) {
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('file_path');
            $table->dropForeign('warranties_contract_id_foreign');
            $table->dropColumn('contract_id');
        });
    }
}
