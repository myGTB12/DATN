<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsTo(Station::class, 'id', 'station_id');
    }

    public $timestamps = true;
}
