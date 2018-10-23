<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table="articles";
    protected $fillable=[
        "Title",
        "Slug",
        "Info",
        "Details",
        "Images",
        "Author",
        "Linked",
        "Status",
        "created_at",
        "updated_at",
    ];
}
