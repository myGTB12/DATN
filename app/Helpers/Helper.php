<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    /**
     * Number show number row
     *
     * @return array<int>
     */
    public static function listPerPages()
    {
        return [15, 50, 100, 200, 500];
    }

    /**
     * Trim string
     *
     * @param string $pString
     *
     * @return string
     */
    public static function mbTrim($pString)
    {
        return preg_replace(
            "/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u",
            "",
            $pString
        );
    }

    public static function getDataAddMinutes($date, int $minutes)
    {
        $dateAdd = Carbon::parse($date);

        return $dateAdd->addMinutes($minutes);
    }

    public static function getDataSubMinutes($date, int $minutes)
    {
        $dateSub = Carbon::parse($date);

        return $dateSub->subMinutes($minutes);
    }

    public static function listYearsToCurrentYear($year)
    {
        $yearArr = [];
        $yearCurrent = Carbon::now()->year;

        for ($y = $yearCurrent; $y >= $year; $y--) {
            $yearArr[] = $y;
        }

        return $yearArr;
    }

    public static function caculatePercentTwoTotalAmount(
        $totalAmoutFirst,
        $totalAmoutLast
    ) {
        switch (true) {
            case !$totalAmoutFirst && !$totalAmoutLast:
                return 0;
            case !$totalAmoutFirst && $totalAmoutLast:
                return -100;
            case $totalAmoutFirst && !$totalAmoutLast:
                return "-";
            default:
                return round(
                    (($totalAmoutFirst - $totalAmoutLast) / $totalAmoutLast) *
                        100,
                    1
                );
        }
    }

    public static function cryptEncrypt(
        string $payload,
        string $encryptMethod = "AES-256-CBC"
    ): string {
        $key = hash("sha256", config("common.encrypt_secret_key"));
        $iv = substr(hash("sha256", config("common.secret_iv")), 0, 16);

        return base64_encode(
            openssl_encrypt($payload, $encryptMethod, $key, 0, $iv)
        );
    }

    public static function cryptDecrypt(
        string $payload,
        string $encryptMethod = "AES-256-CBC"
    ): string {
        $key = hash("sha256", config("common.encrypt_secret_key"));
        $iv = substr(hash("sha256", config("common.secret_iv")), 0, 16);

        return openssl_decrypt(
            base64_decode($payload),
            $encryptMethod,
            $key,
            0,
            $iv
        );
    }

    public static function validateRole($id, string $role)
    {
        if (!session()->get($role) && auth()->guard($role)->user()->id !== $id) {
            return false;
        }

        return true;
    }
}
