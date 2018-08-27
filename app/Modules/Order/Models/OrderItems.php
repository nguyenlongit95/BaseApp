<?php
namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;


class OrderItems extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        "id",
        "order_id",
        "currency_id",
        "currency_code",
        "product_name",
        "product_sku",
        "product_qty",
        "product_price",
        "product_tax",
        "subtotal",
        "options",
        "module",
        "provider_name",
        "provider_key",
        "admin_note"
    ];

}
