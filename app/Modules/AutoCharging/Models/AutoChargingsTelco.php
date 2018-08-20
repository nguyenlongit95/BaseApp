<?php

namespace App\Modules\AutoCharging\Models;
use Illuminate\Database\Eloquent\Model;

class AutoChargingsTelco extends Model
{
    protected $table = 'autochargings_telco';
    protected $fillable = [
        'id','name','key','icon','description','status'
    ];


}
