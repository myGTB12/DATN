<?php

namespace App\Repositories\Eloquent;

use App\Models\Voucher;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;
use Log;

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

    public function addVoucher($request)
    {
        if ($request->file('img')) {
            $file = $request->file('img');
            $file_path = env('STORAGE_PATH');
            $file_name = Carbon::now()->format("Y-m-d") . random_int(1, 100) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("img", $file, $file_name);

            try {
                $this->model->create([
                    "name" => $request->name,
                    "description" => $request->description,
                    "amount" => $request->amount,
                    "img" => $file_path . $file_name,
                    "start_time" => $request->start_time,
                    "expire_time" => $request->expire_time,
                ]);

                return true;
            } catch (Exception $e) {
                return redirect()->back()->with("error", __('messages.create_data_failed'));
            }
        }

        return redirect()->back()->with("error", __('messages.create_data_failed'));
    }
}
