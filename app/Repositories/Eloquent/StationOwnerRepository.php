<?php

namespace App\Repositories\Eloquent;

use App\Models\StationOwner;
use Illuminate\Support\Facades\Hash;

class StationOwnerRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return StationOwner::class;
    }

    public function checkOwner($request)
    {
        $model = $this->model
            ->where("email", ($request->email))
            ->whereNotNull("email_verified_at")
            ->first();
        if (Hash::check($request->password, $model->password)) {
            return $model;
        }
        return;
    }
}
