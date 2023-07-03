<?php

namespace App\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EditStationOwnerForm
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
            "status" => ["bail", "required"],
            "company_name" => ["bail", "string", "max:255"],
            "email" => ["bail", "email"],
            "phone" => ["bail"],
        ]);

        return $validator->validate();
    }
}
