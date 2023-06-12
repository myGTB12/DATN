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
        Schema::create('stations', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->string('name', 100)->nullable();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->string('owner_id', 100);
            $table->string('address', 255)->nullable();
            $table->string('mail_address', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->time('start_business_time')->nullable();
            $table->time('end_business_time')->nullable();
            $table->string('maintenance_time', 10)->nullable();
            $table->tinyInteger('always_open')->default(1);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE stations");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
};
