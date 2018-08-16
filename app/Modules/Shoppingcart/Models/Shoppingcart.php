<?php

namespace App\Modules\Shoppingcart\Models;
use Illuminate\Database\Eloquent\Model;

class Mtopup extends Model
{

    protected $table = 'shoppingcart';
    protected $fillable = [
        'identifier', 'instance','content'
    ];
    
}