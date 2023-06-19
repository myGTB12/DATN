<?php

namespace App\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CreateStationForm
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["bail", "required", "string", "max:255"],
            "status" => ["bail"],
            "owner_id" => ["bail"],
            "address" => ["bail", "required", "string", "max:255"],
            "mail_address" => ["bail", "email"],
            "phone" => ["bail", "required"],
            "start_business_time" => ["bail", "date_format:H:i"],
            "end_business_time" => ["bail", "date_format:H:i", "after:start_business_time"],
            "maintenance_time" => ["bail"],
            "always_open" => ["bail", "digits:1"],
        ]);

        return $validator->validate();
    }
}
