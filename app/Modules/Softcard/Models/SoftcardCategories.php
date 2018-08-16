<?php

namespace App\Modules\Softcard\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class SoftcardCategories extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'category_product';
    protected $fillable = [
        // 'id',
        'category_id',
        'product_id',
        'product_type',
        'sort_order',
        // 'created_at',
        // 'updated_ad',
    ];
}