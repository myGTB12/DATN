<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\HasUuid;

class Station extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $table = "stations";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "status",
        "owner_id",
        "address",
        "mail_address",
        "phone",
        "start_business_time",
        "end_business_time",
        "maintenance_time",
        "always_open",
    ];

    public $timestamps = true;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function stationOwner()
    {
        return $this->belongsTo(StationOwner::class, "owner_id", "id");
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
