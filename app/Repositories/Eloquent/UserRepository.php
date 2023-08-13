<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
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
            ->orWhere("user_name", ($request->email))
            ->first();

        if ($model && Hash::check($request->password, $model->password)) {
            return $model;
        }
        return;
    }
}
