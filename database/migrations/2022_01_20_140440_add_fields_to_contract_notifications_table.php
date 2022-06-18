<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToContractNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_notifications', function (Blueprint $table) {
            $table->dropColumn('outcome');
            $table->dropColumn('reason');
            $table->date('notification_date');
            $table->date('response_date')->nullable();
            $table->foreignId('first_part_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('second_part_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('reason_id')
                ->constrained('contract_notification_categories')
                ->onDelete('cascade');
            $table->foreignId('contract_notification_response_id')
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
        Schema::table('contract_notifications', function (Blueprint $table) {
            $table->integer('outcome');
            $table->dropColumn('notification_date');
            $table->dropColumn('response_date');
            $table->dropForeign('contract_notifications_first_part_id_foreign');
            $table->dropForeign('contract_notifications_second_part_id_foreign');
            $table->dropForeign('contract_notifications_contract_notification_response_id_foreign');
            $table->dropForeign('contract_notifications_reason_id_foreign');
        });
    }
}
