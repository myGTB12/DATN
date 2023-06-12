<?php

namespace App\Form;

/**
 * CustomValidator
 * This call a form validator class
 */
class CustomValidator
{
    /**
     * validate
     *
     * @param array  $request
     * @param string $class
     *
     * @return JSON || boolean
     */
    public function validate($request, string $class)
    {
        // Declare object
        $formValidator = str_replace(
            "{{$class}}",
            $class,
            "\App\Form\{$class}"
        );
        $formValidator = new $formValidator();
        // Validate inputs
        $error = $formValidator->validate($request);
        return $error;
    }
}
