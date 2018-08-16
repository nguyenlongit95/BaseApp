<?php

namespace App\Modules\Localbank\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class LocalbankUser extends Model
{
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'localbanks_user';
    protected $fillable = [
        'user_id', 'bank_id', 'name', 'acc_num', 'acc_name','branch', 'approve', 'status'
    ];


    /**s
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}