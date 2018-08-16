<?php

namespace App\Modules\Tags\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Tagitems extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tags_items';
    protected $fillable = [
        'tag_id',
        'item_id',
        'type',
        // 'created_at',
        // 'updated_at',
    ];

}