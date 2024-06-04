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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_type_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->string('deceased_name');
            $table->date('date_of_death');
            $table->string('order_headline');
            $table->foreignId('cemetery_id')->constrained();
            $table->string('plot_grave');
            $table->boolean('inscription_completed')->nullable();
            $table->date('job_was_fixed_on')->nullable();
            $table->foreignId('source_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->longText('special_instructions')->nullable();
            $table->foreignId('status_id')->constrained()->nullable();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('grave_space_id')->constrained();
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
        Schema::dropIfExists('orders');
    }
};
