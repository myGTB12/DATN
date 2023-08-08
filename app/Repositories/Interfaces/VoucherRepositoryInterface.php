<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface VoucherRepositoryInterface extends RepositoryInterface
{
    public function getAvailableVouchers();
    public function addVoucher(Request $request);
}
