<?php

namespace App\Repositories\Eloquent;

use App\Models\Admins;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Admins::class;
    }

    public function checkAdmin($request)
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
