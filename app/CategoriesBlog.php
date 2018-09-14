<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesBlog extends Model
{
    //
    protected $table="categories_blogs";

    protected $fillable=[
        "NameCategory",
        "Info",
        "Parent_id",
    ];
}
