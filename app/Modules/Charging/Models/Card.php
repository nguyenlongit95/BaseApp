<?php

namespace App\Modules\Charging\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $table = 'chargings_cards';
    protected $fillable = [
        'name','key','image','discount_manual', 'discount_api', 'available_values','status','sort'
    ];


    /**s
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}