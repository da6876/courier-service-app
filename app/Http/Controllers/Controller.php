<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function getCurrentDateTime(){

        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->toDateTimeString();
        return $formattedDateTime;
    }
    public function getCurrentDate(){
        return Carbon::now()->toDateString();
    }

    public function generateCustomString()
    {
        $letters = Str::upper(Str::random(4));
        $digits = rand(10, 99);

        return $letters . $digits;
    }
}
