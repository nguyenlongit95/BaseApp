<?php
namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_no','type','user','userinfo','module_name','tax_fee','amount','currency_code','paygate_code','affiliate_code','order_status','payment_status','shipment','shipinfo','user_note','admin_note'
    ];

}
