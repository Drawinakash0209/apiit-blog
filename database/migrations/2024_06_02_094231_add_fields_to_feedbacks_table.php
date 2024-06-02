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
        Schema::table('feedback', function (Blueprint $table) {
            $table->boolean('anonymous')->default(false)->after('content'); // Add 'anonymous' field
            $table->unsignedBigInteger('user_id')->nullable()->after('anonymous'); // Add 'user_id' field

            // Add foreign key constraint if 'users' table exists
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key first
            $table->dropColumn('user_id'); // Then drop the 'user_id' column
            $table->dropColumn('anonymous'); // Drop the 'anonymous' column
        });
    }
};
