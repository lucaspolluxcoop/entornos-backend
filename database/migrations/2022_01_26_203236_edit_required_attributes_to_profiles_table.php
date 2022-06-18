<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditRequiredAttributesToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('last_name')->nullable(false)->change();
            $table->foreignId('economic_activity_type_id')->nullable()->change();
            $table->string('cuit')->nullable(false)->change();
            $table->integer('family_group_adults')->nullable();
            $table->integer('family_group_under_age')->nullable();
            $table->string('other_economic_activity_type_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('last_name')->nullable()->change();
            $table->foreignId('economic_activity_type_id')->nullable(false)->change();
            $table->string('cuit')->nullable()->change();
            $table->dropColumn('family_group_adults');
            $table->dropColumn('family_group_under_age');
            $table->dropColumn('other_economic_activity_type_name');
        });
    }
}
