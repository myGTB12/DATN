<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Eloquent\VoucherRepository;

class VoucherService
{
    protected VoucherRepository $voucherRepository;

    public function __construct(
        VoucherRepository $voucherRepository,
    ) {
        $this->voucherRepository = $voucherRepository;
    }

    public function getAvailableVouchers()
    {
        return $this->voucherRepository->getAvailableVouchers();
    }

    public function addVoucher(Request $request)
    {
        return $this->voucherRepository->addVoucher($request);
    }
}
