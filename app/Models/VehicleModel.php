<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\HasUuid;

class VehicleModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

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
