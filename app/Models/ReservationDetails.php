<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasUuid;

class ReservationDetails extends Model
{
    use HasFactory;
    use HasUuid;
    
    protected $table = "reservation_details";
    public $timestamps = true;
}
