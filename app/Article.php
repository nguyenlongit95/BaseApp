<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table="article";
    protected $fillable=[
        "Title",
        "Info",
        "Details",
        "Images",
        "Author",
        "Linked",
        "created_at",
        "updated_at",
    ];
}
