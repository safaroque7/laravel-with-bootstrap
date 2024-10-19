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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_review')->default(0);
            $table->string('google_review')->default(0);
            $table->string('page_number')->nullable();
            $table->string('client_photo')->nullable();
            $table->string('status')->default(0);
            $table->string('facebook_profile')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
