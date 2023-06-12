<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 20)->nullable();
            $table->string('email', 100)->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password', 255)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->datetime('birthday')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE users");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
