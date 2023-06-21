<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\HasUuid;
use App\Models\Vehicle;

class VehicleDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

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
        "fuel",
        "vehicle_number",
        "color",
        "brand",
        "name",
        "capacity",
        "length",
        "width",
        "height",
        "booking_status",
        "booking_start",
        "booking_end",
    ];
    public $timestamps = true;

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
