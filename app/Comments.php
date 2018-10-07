<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table="comments";

    protected $fillable=[
        "idBlog",
        "idUser",
        "Comment",
        "Author",
        "State",
        "Parent_id"
    ];
}
