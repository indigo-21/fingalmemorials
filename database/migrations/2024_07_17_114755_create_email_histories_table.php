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
        Schema::create('email_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->string("email_to");
            $table->boolean("has_order_attachment")->default("0");
            $table->boolean("has_inscription_attachment")->default("0");
            $table->boolean("has_invoice_attachment")->default("0");
            $table->boolean("has_receipt_attachment")->default("0");
            $table->string("attachment")->nullable();
            $table->longText("email_body");
            $table->foreignId('emailed_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_histories');
    }
};
