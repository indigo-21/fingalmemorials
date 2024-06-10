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
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->string('details_of_work')->nullable();
            $table->foreignId('vat_code_id')->constrained();
            $table->foreignId('analysis_id')->constrained();
            $table->float('job_cost', 10, 2);
            $table->float('discount', 10, 2);
            $table->float('total', 10, 2);
            $table->float('additional_fee', 10, 2);
            $table->float('net_amount', 10, 2);
            $table->float('vat_amount', 10, 2);
            $table->float('zero_rated_amount', 10, 2);
            $table->float('adjusment_amount', 10, 2);
            $table->float('gross_amount', 10, 2);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_details');
    }
};
