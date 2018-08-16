<?php

namespace App\Modules\News\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'news';
    protected $fillable = [
        'title',
        'url_key',
        'short_description',
        'content',
        'author',
        'author_email',
        'language',
        'custom_layout',
        'status',
        'publish_date',
        // 'created_at',
        // 'updated_at',
    ];

}