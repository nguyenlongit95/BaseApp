<?php

namespace App\Modules\AutoCharging\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class AutoCard extends Model
{
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $table = 'autochargings_cards';
    protected $fillable = [
        'name','key','image','discount_manual', 'discount_api', 'available_values','status','sort'
    ];


    /**s
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
