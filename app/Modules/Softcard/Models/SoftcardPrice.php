<?php

namespace App\Modules\Softcard\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class SoftcardPrice extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'softcard_item_price';
    protected $fillable = [
        // 'id',
        'item_id',
        'currency_id',
        'price',
        // 'created_at',
        // 'updated_ad',
    ];
}