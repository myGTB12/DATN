<?php

namespace App\Http\Traits;

use App\Helpers\Helper;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable, true)) {
            $value = !empty($value) ? Helper::cryptDecrypt($value) : null;
            return $value;
        }
        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable, true)) {
            $value = !empty($value) ? Helper::cryptEncrypt($value) : null;
        }
        return parent::setAttribute($key, $value);
    }

    public function attributesToArray()
    {
        $attributes = parent::attributesToArray(); // call the parent method

        foreach ($this->encryptable as $key) {
            if (isset($attributes[$key])) {
                $attributes[$key] = Helper::cryptDecrypt($attributes[$key]);
            }
        }
        return $attributes;
    }
}
