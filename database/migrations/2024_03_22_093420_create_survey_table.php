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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('slug');
            $table->text('description');

            $table->string('form_link');

            // $table->string('meta_title');
            // $table->mediumText('meta_description');
            // $table->mediumText('meta_keywords');

            $table->string('crated_by');
            $table->string('cb_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
