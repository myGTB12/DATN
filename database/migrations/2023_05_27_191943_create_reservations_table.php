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
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('(UUID())'))->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('vehicle_id')->nullable();
            $table->uuid('station_start_id')->nullable();
            $table->uuid('station_end_id')->nullable();
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->decimal('overtime', 4, 2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('unit_price')->nullable();
            $table->bigInteger('usage_fee')->nullable();
            $table->bigInteger('insurance_fee')->nullable();
            $table->bigInteger('total_amount')->nullable();
            $table->dateTime('cancel_at')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->integer('per_night_price')->nullable();
            $table->integer('count_day')->nullable();
            $table->integer('unit_over_time')->nullable();
            $table->integer('over_time_price')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE reservations");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
