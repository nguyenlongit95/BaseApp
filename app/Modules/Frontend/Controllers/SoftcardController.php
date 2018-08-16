<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Modules\Frontend\Controllers\FrontController;
use Auth;
use Validator;
use App;
use Cart;
use App\Modules\Categories\Models\Categories;
use App\Modules\Categories\Models\CategoriesProduct;
use App\Modules\Softcard\Models\Softcard;
use App\Modules\Softcard\Models\SoftcardGallery;
use App\Modules\Softcard\Models\SoftcardItem;
use App\Modules\Softcard\Models\SoftcardPrice;
use App\Modules\Softcard\Models\SoftcardDiscount;


class SoftcardController extends FrontendController
{

    public function index()
    {
    	/* get sub cate "Softcard" id=15 */
    	$categories = static::getSubCategories(0);
    	$products = array();
    	$thumb = array();
    	$options = array();
    	if(count($categories)){
	    	foreach ($categories as $cate) {
	    		$products[$cate->id] = static::getCategoryProduct($cate->id);
	    		if(count($products[$cate->id])){
		    		foreach ($products[$cate->id] as $pro) {
				    	// echo 'img: '.$pro->value
				    	$thumb[$pro->id] = static::getProductThumb($pro->id);
				    	// echo '<pre>';
				    	$items = static::getProductOptions($pro->id);
				    	$options[$pro->id] = array();
				    	foreach ($items as $item) {
				    		$options[$pro->id][$item->id] = $item->toArray();
                            if(count($item->price))
				    		  $options[$pro->id][$item->id]['price'] = $item->price->first()->toArray();
                            if(count($item->discount))
				    		  $options[$pro->id][$item->id]['discount'] = $item->discount->first()->toArray();
				    	}
				    }
				}
	    	}
	    }
        $added_items = array();
        if(Cart::count()){
            foreach (Cart::content() as $row){
                $added_items[$row->id] = $row->rowId;
            }
        }
        $shopping_cart = static::renderShoppingCart();
        return view('frontend.pages.muamathe', compact('categories','products','thumb','options','shopping_cart','added_items'));
    }

    public static function getUserGroup(){
        if (Auth::check()) {
            $group = Auth::user()->group;
        }else{
            $group = '';
        }
        return $group;
    }

    public static function getCurrency(){
        return 1;
    }

    public static function getSubCategories($cate_id){
    	return Categories::where('parent_id',$cate_id)
    					->where('status',1)
    					->get();
    }

    public static function getCategoryProduct($cate_id){
    	$product_ids = CategoriesProduct::where('category_id',$cate_id)
    									->get(array('product_id'))
    									->toArray();
    	$products = Softcard::whereIn('softcard.id',$product_ids)
    						->where('softcard.status',1)
    						// ->leftJoin('product_gallery', 'softcard.id', '=', 'product_gallery.product_id')
    						// ->groupBy('softcard.id')
    						->get();
    	return $products;
    }

    public static function getProductThumb($pid){
    	$thumb = array();
    	$image = SoftcardGallery::where('product_id',$pid)
    							->where('status',1)
    							->orderBy('is_thumb','DESC')
    							->get(array('value','label'))
    							->first();
    	if($image){
			$thumb['url'] = $image->value;
			$thumb['alt'] = $image->label;
		}
    	return $thumb;
    }

    public static function getProductOptions($pid){
    	$result = array();
    	$items = SoftcardItem::where('softcard_id',$pid)
    						->with(['price' => function ($query) {
											    $query->where('currency_id',static::getCurrency());
											},
									'discount' => function ($query) {
										    $query->where('group_id',static::getUserGroup());
										}])
							->where('status',1)
							->get();
    	return $items;
    }

    public static function renderShoppingCart(){
        $shopping_cart = view("frontend.pages.giohang")->render();
        return $shopping_cart;
    }

    public function calculateItemPrice($id, $qty=1){
        $result = array();
        $itemPrice = SoftcardPrice::where('item_id',$id)
                                    ->where('currency_id',static::getCurrency())
                                    ->pluck('price')->first();
        if($itemPrice!=null){
            $itemDiscount = SoftcardDiscount::where('item_id',$id)
                                    ->where('group_id',static::getUserGroup())
                                    ->pluck('value')->first();
            if($itemDiscount){
                $result['value'] = $itemPrice - ($itemPrice*$itemDiscount)/100;
                $result['discount'] = number_format($itemDiscount,0);
            }else{
                $result['value'] = $itemPrice;
                $result['discount'] = 0;
            }
        }
        return $result;
    }

    public function ajaxPost(Request $request){
        $input = $request->all();
        if($input['type']=='add' && isset($input['id'])){
            $item = SoftcardItem::find($input['id']);
            $price = $this->calculateItemPrice($item->id);
            if(isset($price['value'])){
                $cartItem = Cart::add([
                    'id' => $item->sku,
                    'name' =>$item->name,
                    'qty' => 1,
                    'price' => $price['value'],
                    'options' => ['discount'=>$price['discount']]
                ]);
                $result['row'] = $cartItem->rowId;
            }
        }elseif($input['type']=='remove'){
            if(isset($input['row'])){
                Cart::remove($input['row']);
            }
        }
        if($input['type']=='update'){
            if(isset($input['qty']) && isset($input['row'])){
                Cart::update($input['row'],$input['qty']);
            }
        }elseif($input['type']=='delete'){
            Cart::destroy();
        }
        $shopping_cart = static::renderShoppingCart();
        $result['shopping_cart'] = $shopping_cart;
        echo json_encode($result);
    }
}