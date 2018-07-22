<?php

namespace App\Traits\Validation;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

trait ValidatesRequests
{
    public function validate($data, $rules){
        $validator = \Validator::make($data,$rules);
        if ($validator->fails()){
            throw new ValidationException($validator, new JsonResponse($validator->messages(), 422));
        }
    }
}