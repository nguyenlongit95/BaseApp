<?php

namespace App\Modules\Product\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name','url','catalog','image','image_other','description','order','public'
    ];


    /**s
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}