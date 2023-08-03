<?php

namespace App\Services;

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
}
