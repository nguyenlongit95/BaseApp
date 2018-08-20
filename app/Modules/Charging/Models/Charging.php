<?php

namespace App\Modules\Charging\Models;
use Illuminate\Database\Eloquent\Model;

class Charging extends Model
{

    protected $fillable = [
        'user','user_info','code','serial', 'telco','declared_value','real_value','fees','api_provider','request_id','order','description',
        'penalty','amount','currency_code','type','error_code','error_message','charge_check','checksum','status','admin_note'
    ];



}
