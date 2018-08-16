<?php

namespace App\Modules\Softcard\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class SoftcardGallery extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'product_gallery';
    protected $fillable = [
        // 'id',
        'product_id',
        'product_type',
        'value',
        'label',
        'is_thumb',
        'sort_order',
        'status',
    ];
}