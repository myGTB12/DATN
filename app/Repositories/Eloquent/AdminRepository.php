<?php

namespace App\Repositories\Eloquent;

use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
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
        if ($model && Hash::check($request->password, $model->password)) {
            return $model;
        }
        return;
    }
}
