<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    use HasFactory;

    protected $table = "admins";

    protected $keyType = "string";

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "status",
        "name",
        "email",
        "phone",
        "password",
        "email_verified_at",
        "token",
        "expires_at",
        "updater_id",
    ];

    /** The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ["password", "remember_token"];

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

    public function stationOwners()
    {
        return $this->hasMany(StationOwner::class, "admin_id", "id");
    }
}
