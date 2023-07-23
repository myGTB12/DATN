<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Traits\HasUuid;

class StationOwner extends Authenticatable
{
    use HasFactory;
    use HasUuid;

    protected $table = "station_owners";

    protected $keyType = "string";

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "status",
        "admin_id",
        "name",
        "company_name",
        "email",
        "phone",
        "password",
        "email_verified_at",
    ];

    /** The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "password",
        "remember_token",
        "id",
        "created_at",
        "updated_at",
        "email_verified_at",
        "admin_id"
    ];

    /**
     * The attributes that should be visible for serialization.
     *
     * @var array<int, string>
     */
    protected $visible = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function stations()
    {
        return $this->hasMany(Station::class, "owner_id", "id");
    }

    public function canCreateStation()
    {
        return $this->stations->count() < config('custom_config.max_station');
    }

    public $timestamps = true;
}
