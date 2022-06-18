<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThirdPartyBooleanToEconomicActivityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('economic_activity_types', function (Blueprint $table) {
            $table->boolean('third_party')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('economic_activity_types', function (Blueprint $table) {
            $table->dropColumn('third_party');
        });
    }
}
