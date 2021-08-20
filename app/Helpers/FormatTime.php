<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FormatTime
{
    public static function timeToDate($time)
    {
        return  Carbon::parse($time)->format('d F Y');

    }
}
