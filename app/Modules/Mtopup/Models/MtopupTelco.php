<?php

namespace App\Modules\Mtopup\Models;
use Illuminate\Database\Eloquent\Model;

class MtopupTelco extends Model
{
    protected $table = 'mtopup_telco';
    protected $fillable = [
        'name','key','number_format','icon','description','status','value'
    ];
}
