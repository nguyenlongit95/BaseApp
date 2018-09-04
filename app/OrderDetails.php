<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $table="order_details";

    protected $fillable=[
        "idProduct",
        "idOrder",
        "NameProduct",
        "Quantity",
        "Price",
        "CodeOrder"
    ];
}
