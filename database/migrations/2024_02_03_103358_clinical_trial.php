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
        Schema::create('clinical_trial', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->date('date_of_birth');
            $table->integer('migrain_frequency');
            $table->integer('daily_frequency');
            $table->string('result');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_trial');
    }
};
