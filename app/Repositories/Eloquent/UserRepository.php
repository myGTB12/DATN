<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return User::class;
    }

    public function checkUser($request)
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
