<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->integer('outcome');
            $table->foreignId('contract_notification_category_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('contract_id')
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
        Schema::dropIfExists('contract_notifications');
    }
}
