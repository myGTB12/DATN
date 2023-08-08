<?php

namespace App\Models;

use App\Http\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    protected $table = "vouchers";

    protected $fillable = [
        'start_time',
        'expire_time',
        'percent',
        'amount',
        'name',
        'img',
        'description',
        'code',
    ];

    public $timestamps = true;
}
