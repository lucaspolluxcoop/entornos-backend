<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->nullable();
            $table->string('other_reason')->nullable();
            $table->date('date');
            $table->foreignId('notification_management_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('notification_reason_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('notification_response_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('user_id')
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
        Schema::dropIfExists('notifications');
    }
}
