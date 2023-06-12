<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "vehicle_details";

    protected $casts = [
        "fuel" => "float",
    ];

    protected $fillable = [
        "vehicle_id",
        "img",
        "img2",
        "img3",
        "img4",
        "vehicle_model_id",
        "fuel",
        "vehicle_number",
        "color",
        "booking_start",
        "booking_end",
    ];
    public $timestamps = true;

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
