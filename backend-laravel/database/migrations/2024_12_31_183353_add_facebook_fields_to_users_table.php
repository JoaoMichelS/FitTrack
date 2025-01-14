<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function ($table) {
            $table->string('facebook_id')->nullable();
            $table->string('facebook_token')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropColumn(['facebook_id', 'facebook_token']);
        });
    }
};
