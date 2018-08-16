<?php

namespace App\Modules\Softcard\Models;

use App\Modules\Stockcard\Models\Stockcard;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Softcard extends Model
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'softcard';
    protected $fillable = [
        // 'id',
        'name',
        'url_key',
        'short_description',
        'description',
        'status',
        // 'created_at',
        // 'updated_ad',
    ];

    /**
     * Get items for the softcard.
     */
    public function items()
    {
        return $this->hasMany(
            'App\Modules\Softcard\Models\SoftcardItem',
            'softcard_id',
            'id'
        );
    }

    /**
     * Get discounts for the softcard.
     */
    public function discounts()
    {
        return $this->hasManyThrough(
            'App\Modules\Softcard\Models\SoftcardDiscount',
            'App\Modules\Softcard\Models\SoftcardItem',
            'softcard_id',
            'item_id',
            'id',
            'id'
        );
    }

    /**
     * Get item prices for the softcard.
     */
    public function prices()
    {
        return $this->hasManyThrough(
            'App\Modules\Softcard\Models\SoftcardPrice',
            'App\Modules\Softcard\Models\SoftcardItem',
            'softcard_id',
            'item_id',
            'id',
            'id'
        );
    }

    /**
     * Get categories for the softcard.
     */
    public function categories()
    {
        return $this->hasMany(
            'App\Modules\Softcard\Models\SoftcardCategories',
            'product_id',
            'id'
        );
    }

    /**
     * Get gallery for the softcard.
     */
    public function gallery()
    {
        return $this->hasMany(
            'App\Modules\Softcard\Models\SoftcardGallery',
            'product_id',
            'id'
        );
    }

    public static function getCard($order_no, $sku)
    {

        $lsCard = Stockcard::where('order_no', $order_no)->where('item_sku', $sku)->get();
        return $lsCard;
    }

}
