<?php

namespace App\Modules\Charging\Models;
use Illuminate\Database\Eloquent\Model;

class ChargingsTelco extends Model
{
    protected $table = 'chargings_telco';
    protected $fillable = [
        'name','key','icon','description','status'
    ];


}
