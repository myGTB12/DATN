<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface extends RepositoryInterface
{
    public function checkAdmin($request);
}
