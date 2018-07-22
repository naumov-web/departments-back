<?php

namespace App\Http\Controllers;

class HandbookController extends Controller
{

    /**
     * Get gender types
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public function gender()
    {
        return config('gender');
    }

}