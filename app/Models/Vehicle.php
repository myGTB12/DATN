<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\HasUuid;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $fillable = [
        "station_id",
        "status",
        "vehicle_inspection_exp_date",
    ];

    public function vehicleDetail(): HasOne
    {
        return $this->hasOne(VehicleDetail::class, 'vehicle_id', 'id');
    }

    public function stations()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public $timestamps = true;
}
