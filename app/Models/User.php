<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Traits\HasUuid;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasUuid;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["first_name", "email", "password", "phone",];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public $timestamps = true;

    public function reservation(): HasOne
    {
        return $this->hasOne(Reservation::class, "user_id", "id");
    }
}
