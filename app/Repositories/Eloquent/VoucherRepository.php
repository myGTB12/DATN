<?php

namespace App\Repositories\Eloquent;

use App\Models\Voucher;
use Carbon\Carbon;

class VoucherRepository extends BaseRepository
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Voucher::class;
    }

    public function getAvailableVouchers()
    {
        return $this->model->select(
            "vouchers.*"
        )->where("vouchers.expire_time", ">", Carbon::now())->get();
    }
}
