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
            $table->foreignId('user_id')
                ->constrained()
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
            $table->dropForeign('contract_notifications_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('contract_notifications_contract_notification_response_id_foreign');
            $table->dropColumn('notification_response_id');
            $table->dropForeign('contract_notifications_reason_id_foreign');
            $table->dropColumn('reason_id');
        });
    }
}
