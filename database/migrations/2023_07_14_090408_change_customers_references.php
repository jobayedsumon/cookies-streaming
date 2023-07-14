<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('deposits', function ($table) {
            $table->dropForeign('deposits_customer_id_foreign');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade')
                ->onUpdate('cascade')->change();
        });

        Schema::table('withdrawals', function ($table) {
            $table->dropForeign('withdrawals_customer_id_foreign');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade')
                ->onUpdate('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('deposits', function ($table) {
            $table->dropForeign('deposits_customer_id_foreign');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->change();
        });

        Schema::table('withdrawals', function ($table) {
            $table->dropForeign('withdrawals_customer_id_foreign');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->change();
        });
    }
};
