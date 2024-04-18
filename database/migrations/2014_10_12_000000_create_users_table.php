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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Custom fields
            $table->string('cb_number')->nullable()->unique();

            $table->string('batch');
            $table->boolean('is_approved')->default(0);
            //user type without defaults
            $table->string('user_type');
            //level
            $table->string('level');
            //school
            $table->string('school');
            //degree
            $table->string('degree');
            //nic
            $table->string('nic');
            //graduated year
            $table->string('graduated_year');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
