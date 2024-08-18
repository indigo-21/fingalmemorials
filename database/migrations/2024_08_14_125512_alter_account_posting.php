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
        Schema::table('account_postings', function (Blueprint $table) {
            $table->string("nominal")->nullable()->after("account_type_id");
            $table->string("description")->nullable()->after("invoice_number");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('account_postings', function (Blueprint $table) {
            $table->string("nominal")->nullable()->after("account_type_id");
            $table->string("description")->nullable()->after("invoice_number");
        });
    }
};
