<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table="products";

    protected $fillable=[
        "NameProduct",
        "idCategories",
        "Quantity",
        "Price",
        "Sales",
        "Info",
        "Description"
    ];
}
