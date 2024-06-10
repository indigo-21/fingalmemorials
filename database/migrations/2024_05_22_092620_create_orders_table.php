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
            $table->date('order_date');
            $table->string('deceased_name');
            $table->foreignId('order_type_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->date('date_of_death');

            $table->string('order_headline');
            $table->foreignId('cemetery_id')->constrained();
            $table->string('plot_grave');
            $table->foreignId('grave_space_id')->constrained();

            $table->foreignId('status_id')->constrained();
            $table->boolean('inscription_completed')->nullable();
            $table->date('inscription_completed_date')->nullable();
            $table->date('job_was_fixed_on')->nullable();

            $table->foreignId('source_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->longText('special_instructions')->nullable();

            $table->foreignId('customer_id')->constrained();
            $table->float('balance', 10, 2)->nullable();
            $table->float('value', 10, 2)->nullable();
            $table->foreignId('created_by')->constrained('users');
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
