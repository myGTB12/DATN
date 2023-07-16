<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Traits\HasUuid;

class Reservation extends Model
{
    use HasFactory;
    use HasUuid;

    protected $table = "reservations";

    protected $casts = [
        // "start_time" => "datetime",
        // "end_time" => "datetime",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "user_id",
        "vehicle_id",
        "station_start_id",
        "station_end_id",
        "start_time",
        "end_time",
        "overtime",
        "status",
        "unit_price",
        "usage_fee",
        "insurance_fee",
        "total_amount",
        "cancel_at",
        "cancel_reason",
        "per_night_price",
        "count_day",
        "unit_over_time",
        "over_time_price",
        "created_by",
        "updated_by",
    ];
    public $timestamps = true;

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, "station_start_id", "id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function vehicelDetail(): BelongsTo
    {
        return $this->belongsTo(
            VehicleDetail::class,
            "vehicle_id",
            "vehicle_id"
        )
            ->select("vehicle_details.*")
            ->withTrashed();
    }
}
