<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    //
    protected $table="seo";

    protected $fillable = [
        "id",
        "link",
        "checksum",
        "title",
        "keywords",
        "description",
        "h1",
        "noindex",
        "avatar",
        "language",
        "created_at",
        "updated_at"
    ];


}
