<?php

namespace App\Modules\Mtopup\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class MtopupFees extends Model
{
    protected $table = 'mtopup_fees';
    protected $fillable = [
        'group','discount','telco_key','telco_type'
    ];

    public static function getValueByGroupandTelco($group_id, $telco,$telco_type, $field)
    {
        $val = DB::table('mtopup_fees')->where('telco_key',$telco)->where('telco_type',$telco_type)->where('group',$group_id)->select($field)->first();
        if( $val )
        {
            return $val->$field;
        }
        return null;
    }

}
