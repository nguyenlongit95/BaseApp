<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    protected $table="contacts";

    protected $fillable=[
        "Name",
        "Email",
        "Address",
        "Message",
        "State"
    ];
}
