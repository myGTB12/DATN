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
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->uuid('vehicle_id')->nullable();
            $table->uuid('vehicle_model_id')->nullable();
            $table->decimal('fuel', 10, 2)->nullable();
            $table->string('img', 255)->nullable();
            $table->string('img2', 255)->nullable();
            $table->string('img3', 255)->nullable();
            $table->string('img4', 255)->nullable();
            $table->string('vehicle_number', 20)->nullable();
            $table->string('color', 36)->nullable();
            $table->dateTime('booking_start')->nullable();
            $table->dateTime('booking_end')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE vehicle_details");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_details');
    }
};
