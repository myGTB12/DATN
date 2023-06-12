<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetails extends Model
{
    use HasFactory;
    protected $table = "reservation_details";
    public $timestamps = true;
}
