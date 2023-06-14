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
        Schema::create('station_owners', function (Blueprint $table) {
            $table->id();
            $table->uuid('admin_id')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_owners');
    }
};
