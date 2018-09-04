<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //
    protected $table="blogs";

    protected $fillable=[
        "Title",
        "Info",
        "Description",
        "Author",
        "Tags",
        "idCategoryBlog"
    ];
}
