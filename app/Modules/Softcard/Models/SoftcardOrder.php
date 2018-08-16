<?php
namespace App\Modules\Softcard\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;

class SoftcardOrder extends Model
{
    protected $table = 'softcard_orders';
    protected $fillable = [
        'order_no','product','product_sku','qty','discount','subtotal','user','user_info','order_status','payment_status','cart_content'
    ];
}
