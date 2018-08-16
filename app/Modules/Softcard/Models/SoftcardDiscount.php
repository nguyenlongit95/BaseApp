<?php

namespace App\Modules\Softcard\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class SoftcardDiscount extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'softcard_item_discount';
    protected $fillable = [
        // 'id',
        'item_id',
        'group_id',
        'value',
        'status',
        // 'created_at',
        // 'updated_ad',
    ];
}