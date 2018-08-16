<?php

namespace App\Modules\Mtopup\Models;
use Illuminate\Database\Eloquent\Model;

class Mtopup extends Model
{

    protected $table = 'mtopups';
    protected $fillable = [
        'order_id', 'user','user_info', 'telco', 'phone_number','declared_value','completed_value','telco_type','discount','amount','currency_code','mix','status','payment_status'
    ];

}
