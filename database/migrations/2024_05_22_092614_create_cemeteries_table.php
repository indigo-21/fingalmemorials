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
        Schema::create('cemeteries', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('postcode')->nullable();
            $table->string('town')->nullable();
            $table->string('county')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('cemetery_group_id')->constrained();
            $table->foreignId('cemetery_area_id')->constrained();
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
        Schema::dropIfExists('cemeteries');
    }
};
