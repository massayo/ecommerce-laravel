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
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('payment_method_id')->unsigned()->nullable()->after('status');
            $table->string('payment_email')->nullable()->after('payment_method_id');
            $table->string('gender')->nullable()->after('payment_email');
            $table->bigInteger('card_number')->nullable()->after('gender');
            $table->integer('cvc')->nullable()->after('card_number');
            $table->integer('exp_month')->nullable()->after('cvc');
            $table->integer('exp_year')->nullable()->after('exp_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('payment_method_id','payment_email','gender','card_number','cvc','exp_month','exp_year');
        });
    }
};
