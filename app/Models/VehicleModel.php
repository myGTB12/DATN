<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "vehicle_models";

    protected $fillable = [
        "brand",
        "name",
        "img",
        "capacity",
        "displacement",
        "length",
        "width",
        "height",
        "max_load_capacity",
        "vehicle_total_weight",
        "auto_manual",
        "fuel",
        "register_id",
        "updater_id",
    ];

    public function vehicle_details(): HasMany
    {
        return $this->hasMany(VehicleDetail::class);
    }

    public $timestamps = true;
}
