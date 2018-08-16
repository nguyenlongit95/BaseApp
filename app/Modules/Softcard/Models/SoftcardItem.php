<?php

namespace App\Modules\Softcard\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class SoftcardItem extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'softcard_item';
    protected $fillable = [
        // 'id',
        'softcard_id',
        'name',
        'value',
        'price',
        'sku',
        'sort_order',
        'status',
        // 'created_at',
        // 'updated_ad',
    ];

    public function price()
    {
        return $this->hasMany(
            'App\Modules\Softcard\Models\SoftcardPrice',
            'item_id',
            'id'
        );
    }

    public function discount()
    {
        return $this->hasMany(
            'App\Modules\Softcard\Models\SoftcardDiscount',
            'item_id',
            'id'
        );
    }

    public static function countCardSku($product_sku)
    {
        return SoftcardItem::where('sku', $product_sku)->where('status',0)->count();
    }

    public static function getCard($product_sku, $qty)
    {

        if( $qty > 0 )
        {
            $count = StockcardItem::where('item_sku', $product_sku)->where('status', 0)->count();
            if( $count < $qty )
            {
                return 'NotStockcard';
            }
            $lsCard = StockcardItem::where('item_sku', $product_sku)->where('status', 0)->limit($qty)->get();
            foreach( $lsCard as $card  )
            {
                $card->status = 1;
                $card->update();
            }
            return $lsCard;
        }

        return null;
    }
}
