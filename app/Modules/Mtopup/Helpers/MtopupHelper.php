<?php

namespace App\Modules\Mtopup\Helpers;

use App\Modules\Mtopup\Models\MtopupTelco;

class MtopupHelper
{
    public static function getTelcoFromNumber($number_phone = '')
    {
        if( strlen($number_phone) > 2 )
        {
            $telco = MtopupTelco::where('number_format', 'like', '%,'.substr($number_phone,0,3).',%')->first();
            if( $telco )
            {
                return $telco->key;
            }
            $telco = MtopupTelco::where('number_format', 'like', '%,'.substr($number_phone,0,4).',%')->first();
            if( $telco )
            {
                return $telco->key;
            }
        }
        return 'NONETELCO';
    }
}
