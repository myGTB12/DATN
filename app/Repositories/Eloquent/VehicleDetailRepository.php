<?php

namespace App\Repositories\Eloquent;

use Exception;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;

class VehicleDetailRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return VehicleDetail::class;
    }
}
