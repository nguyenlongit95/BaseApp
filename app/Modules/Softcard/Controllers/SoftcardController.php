<?php

namespace App\Modules\Softcard\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use App\Modules\Softcard\Models\Softcard;
use App\Modules\Softcard\Models\SoftcardItem;
use App\Modules\Softcard\Models\SoftcardDiscount;
use App\Modules\Softcard\Models\SoftcardGallery;
use App\Modules\Softcard\Models\SoftcardCategories;
use App\Modules\Softcard\Models\SoftcardPrice;
use Storage;

class SoftcardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $title = 'Softcard List';
        View::share ('title', $title );
    }

	public function index(Request $request)
	{
		$softcard = Softcard::orderBy('id','DESC')->paginate(10);
		if($request->input('keyword')!='')
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $typeSearch = $request->input('type');
            $title  = "Search: ";
            if($typeSearch!==''){
                switch ($typeSearch) {
                    case 'description':
                        $title .= 'Description = ';
                        break;
                    case 'status':
                        $title .= 'Status = ';
                        break;
                    default:
                        $title .= 'Name = ';
                        break;
                }
                if($typeSearch=='status')
                    $softcard = Softcard::where($typeSearch, $keyword)->orderBy('id','DESC')->paginate(10);
                else
                    $softcard = Softcard::where($typeSearch, 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
            }else{
                $softcard = Softcard::where('name', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('description', 'LIKE', '%'.$keyword.'%')
                                ->paginate(10);
            }
            $title .= $keyword;
        }
		return view("Softcard::index", compact('softcard'));
	}

	public function create()
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            $groups_user = $this->getGroupsUser();
            $currencies = $this->getCurrencies();
            $categories = static::getCategories();
            return view('Softcard::create', compact('groups_user','currencies','categories'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'url_key' => 'unique:softcard,url_key|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'items.sku' => 'max:100|unique:softcard_item,sku',
        ]);
        $input = $request->all();
        
        /* save Sofcard Data */
        $softcard = Softcard::create($input);

        /* save Categories Data */
        if(isset($request->catalogs) && count($request->catalogs)){
            foreach ($request->catalogs as $cate_id) {
                $softcardItem = new SoftcardCategories(array(
                    'category_id' => $cate_id,
                    'product_id' => $softcard->id,
                    'product_type' => 'softcard',
                ));
                $softcardItem->save();
            }
        }

        /* save Gallery Data */
        if($request->hasFile('images')){
            foreach ($request->images as $number_img => $image) {
                $is_thumb = 0;
                if($number_img==$request->is_thumb)
                    $is_thumb = 1;
                $filename = $image->store('softcard/images');
                (isset($request->img_label[$number_img]) && $request->img_label[$number_img]) ? $img_label = $request->img_label[$number_img] : $img_label = '';
                (isset($request->img_order[$number_img]) && $request->img_order[$number_img]) ? $img_order = $request->img_order[$number_img] : $img_order = 0;
                (isset($request->img_status[$number_img]) && $request->img_status[$number_img]>0) ? $img_status = 1 : $img_status = 0;
                $gallery = new SoftcardGallery(array(
                    'product_id' => $softcard->id,
                    'product_type' => 'softcard',
                    'value' => $filename,
                    'label' => $img_label,
                    'is_thumb' => $is_thumb,
                    'sort_order' => $img_order,
                    'status' => $img_status,
                ));
                $gallery->save();
            }
        }

        /* save Sofcard items */
        if(isset($request->items) && count($request->items)){
            foreach ($request->items['name'] as $item_number => $item_name) {
                (isset($request->items['value'][$item_number]) && $request->items['value'][$item_number]) ? $item_value = $request->items['value'][$item_number] : $item_value = 0;
                (isset($request->items['sku'][$item_number]) && $request->items['sku'][$item_number]) ? $item_sku = $request->items['sku'][$item_number] : $item_sku = '';
                (isset($request->items['order'][$item_number]) && $request->items['order'][$item_number]) ? $item_order = $request->items['order'][$item_number] : $item_order = 0;
                (isset($request->items['status'][$item_number]) && $request->items['status'][$item_number]>0) ? $item_status = 1 : $item_status = 0;
                $softcardItem = new SoftcardItem(array(
                    'softcard_id' => $softcard->id,
                    'name' => $item_name,
                    'value' => $item_value,
                    'sku' => $item_sku,
                    'sort_order' => $item_order,
                    'status' => $item_status,
                ));
                $softcardItem->save();
                /* save items prices */
                foreach ($request->items['price'] as $currency_id => $value) {
                    $item_price = null;
                    if(isset($value[$item_number])) $item_price = $value[$item_number];
                    $price = new SoftcardPrice(array(
                        'item_id' => $softcardItem->id,
                        'currency_id' => $currency_id,
                        'price' => $item_price,
                    ));
                    $price->save();
                }
                /* save items discount */
                foreach ($request->discount['value'] as $group_id => $value) {
                    (isset($value[$item_number]) && $value[$item_number]) ? $discount_value = $value[$item_number] : $discount_value = 1;
                    $discount = new SoftcardDiscount(array(
                        'item_id' => $softcardItem->id,
                        'group_id' => $group_id,
                        'value' => $discount_value,
                        'status' => 1,
                    ));
                    $discount->save();
                }
            }
        }

        return redirect()->route('softcard.index')
        				->with('success','Softcard created successfully');
    }

    public function edit($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            $softcard = Softcard::find($id);
            $items = $this->getSoftcardItems($id);
            $groups_user = $this->getGroupsUser();
            $currencies = $this->getCurrencies();
            $gallery = $this->getSoftcardGallery($id);
            $sc_categories = $this->getSoftcardCategories($id);
            $categories = static::getCategories($sc_categories);

            return view('Softcard::edit',compact('softcard','items','groups_user','currencies','categories','gallery'));
        }else{
            echo 'Not Access';
            return ;
        }
    }

	public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            'url_key' => 'max:255|unique:softcard,url_key,'.$id,
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        /* update Softcard Data */
        $softcard = Softcard::find($id);
        $softcard->name = $request->name;
        $softcard->url_key = $request->url_key;
        $softcard->description = $request->description;
        $softcard->short_description = $request->short_description;
        $softcard->status = $request->status;;
        $softcard->save();

        /* update Categories Data */
        if(isset($request->catalogs) && count($request->catalogs)){
            /* delete category if not select */
            SoftcardCategories::where('product_id',$id)
                                ->where('product_type','softcard')
                                ->whereNotIn('category_id',$request->catalogs)
                                ->delete();
            /* create new category for softcard */
            foreach ($request->catalogs as $cate_id) {
                $cate = SoftcardCategories::updateOrCreate(array(
                    'category_id' => $cate_id,
                    'product_id' => $id,
                    'product_type' => 'softcard',
                ));
            }
        }else{
            /* delete all categories */
            SoftcardCategories::where('product_id',$id)
                                ->where('product_type','softcard')
                                ->delete();
        }

        /* update Gallery Data */
        /* get all exists gallery */
        $countGallery = SoftcardGallery::where('product_id',$id)
                                        ->where('product_type','softcard')
                                        ->count();
        if(isset($request->gallery_exists) && count($request->gallery_exists)){
            /* delete gallery if not exists */
            $deleteGallery = SoftcardGallery::where('product_id',$id)
                                        ->where('product_type','softcard')
                                        ->whereNotIn('id',$request->gallery_exists)
                                        ->get();
            $this->deleteSoftcardGallery($deleteGallery);

            /* Add new and update gallery exists */
            foreach ($request->gallery_exists as $number_img => $galleryId) {
                $is_thumb = 0;
                if($number_img==$request->is_thumb)
                    $is_thumb = 1;
                (isset($request->img_label[$number_img]) && $request->img_label[$number_img]) ? $img_label = $request->img_label[$number_img] : $img_label = '';
                (isset($request->img_order[$number_img]) && $request->img_order[$number_img]) ? $img_order = $request->img_order[$number_img] : $img_order = 0;
                (isset($request->img_status[$number_img]) && $request->img_status[$number_img]>0) ? $img_status = 1 : $img_status = 0;
                if($galleryId){
                    /* update gallery */
                    $gallery = SoftcardGallery::find($galleryId);
                    $gallery->label = $img_label;
                    $gallery->is_thumb = $is_thumb;
                    $gallery->sort_order = $img_order;
                    $gallery->status = $img_status;
                    $gallery->save();
                }else{
                    /* add new gallery */
                    if(is_object($request->images[$number_img])){
                        $filename = $request->images[$number_img]->store('softcard/images');
                        $gallery = new SoftcardGallery(array(
                            'product_id' => $id,
                            'product_type' => 'softcard',
                            'value' => $filename,
                            'label' => $img_label,
                            'is_thumb' => $is_thumb,
                            'sort_order' => $img_order,
                            'status' => $img_status,
                        ));
                        $gallery->save();
                    }
                }
            }
        }elseif($countGallery){
            /* delete all gallery */
            $existsGallery = SoftcardGallery::where('product_id',$id)
                                        ->where('product_type','softcard')
                                        ->get();
            $this->deleteSoftcardGallery($existsGallery);
        }

        /* update Softcard Items */
        /* get all exists items */
        $countItems = SoftcardItem::where('softcard_id',$id)->count();
        if(isset($request->items_exists) && count($request->items_exists)){
            /* delete item if not exists */
            $deleteItems = SoftcardItem::where('softcard_id',$id)
                                        ->whereNotIn('id',$request->items_exists)
                                        ->get();
            $this->deleteSoftcardItems($deleteItems);

            /* Add new and update items exists */
            foreach ($request->items_exists as $item_number => $itemId) {
                // $parentId = $itemId;
                (isset($request->items['value'][$item_number]) && $request->items['value'][$item_number]) ? $item_value = $request->items['value'][$item_number] : $item_value = 0;
                (isset($request->items['sku'][$item_number]) && $request->items['sku'][$item_number]) ? $item_sku = $request->items['sku'][$item_number] : $item_sku = '';
                (isset($request->items['order'][$item_number]) && $request->items['order'][$item_number]) ? $item_order = $request->items['order'][$item_number] : $item_order = 0;
                (isset($request->items['status'][$item_number]) && $request->items['status'][$item_number]>0) ? $item_status = 1 : $item_status = 0;

                /* update or add new item */
                $softcardItem = SoftcardItem::updateOrCreate(array(
                    'id' => $itemId,
                ),array(
                    'softcard_id' => $id,
                    'name' => $request->items['name'][$item_number],
                    'value' => $item_value,
                    'sku' => $item_sku,
                    'sort_order' => $item_order,
                    'status' => $item_status,
                ));
                $parentId = $softcardItem->id;

                /* update or add new items prices */
                foreach ($request->items['price'] as $currency_id => $value) {
                    $item_price = null;
                    if(isset($value[$item_number])) $item_price = $value[$item_number];
                    $price = SoftcardPrice::updateOrCreate(array(
                        'item_id' => $parentId,
                        'currency_id' => $currency_id,
                    ),array(
                        'price' => $item_price,
                    ));
                }

                /* Add new and update item discount */
                foreach ($request->discount['value'] as $group_id => $value) {
                    (isset($value[$item_number]) && $value[$item_number]>0) ? $discount_value = $value[$item_number] : $discount_value = 0;
                    /* update or add new item discount */
                    $discount = SoftcardDiscount::updateOrCreate(array(
                        'item_id' => $parentId,
                        'group_id' => $group_id,
                    ),array(
                        'value' => $discount_value,
                        'status' => 1,
                    ));
                }
            }
        }elseif($countItems){
            /* delete all options */
            $deleteItems = SoftcardItem::where('softcard_id',$id)
                                        ->get();
            $this->deleteSoftcardItems($deleteItems);
        }

        return redirect()->route('softcard.index')
                        ->with('success','Softcard updated successfully');
    }

    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
            /* delete softcard categories */
            $categories = SoftcardCategories::where('product_id',$id)
                            ->where('product_type','softcard')
                            ->get();
            foreach ($categories as $cate) {
                $cateDeleted = SoftcardCategories::find($cate->id)->delete();
            }

            /* delete softcard gallery */
            $images = SoftcardGallery::where('product_id',$id)
                            ->where('product_type','softcard')
                            ->get();
            foreach ($images as $image) {
                Storage::delete($image->value);
                $imgDeleted = SoftcardGallery::find($image->id)->delete();
            }

            /* delete softcard item */
            $items = SoftcardItem::where('softcard_id',$id)->get();
            foreach ($items as $item) {
                /* delete item discount */
                $discount = SoftcardDiscount::where('item_id',$item->id)->delete();
                /* delete item price */
                $price = SoftcardPrice::where('item_id',$item->id)->delete();

                $deleted = SoftcardItem::find($item->id)->delete();
            }
            /* delete softcard */
            Softcard::find($id)->delete();

            return redirect()->route('softcard.index')
                        ->with('success','Softcard deleted successfully');
        }else{
            echo 'Not Access';
            return ;
        }
    }

	public function actions(Request $request)
    {
        $val    = $request->check;
        $action = $request->action;
        if(empty($val)){
            return redirect()->route('softcard.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $tag = Softcard::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('softcard.index')->with('success','Softcard '.$action.' successfully');
    }

    private function _runAction($id, $action)
    {
        switch ($action) {
            case 'delete':
                $this->destroy($id);
                break;
            
            default:
                break;
        }
        return null;
    }

    public static function getSoftcardItems($id){
        $result = array();
        $items = Softcard::find($id)->items()
                                    ->orderBy('sort_order','ASC')
                                    ->get()
                                    ->toArray();
        foreach ($items as $key => $item) {
            $result[$key] = $item;
            $discounts = Softcard::find($id)->discounts()
                                            ->where('item_id',$item['id'])
                                            ->get()
                                            ->toArray();
            if(count($discounts)){
                foreach ($discounts as $discount) {
                    $sort_discount[$discount['group_id']] = $discount;
                }
                $result[$key]['discount'] = $sort_discount;
            }

            $prices = Softcard::find($id)->prices()
                                        ->where('item_id',$item['id'])
                                        ->get()
                                        ->toArray();
            if(count($prices)){
                foreach ($prices as $price) {
                    $sort_price[$price['currency_id']] = $price;
                }
                $result[$key]['prices'] = $sort_price;
            }
        }
        return $result;
    }

    public static function getSoftcardGallery($id){
        $gallery = Softcard::find($id)->gallery()
                                    ->where('product_type','softcard')
                                    ->orderBy('sort_order','ASC')
                                    ->get()
                                    ->toArray();
        return $gallery;
    }

    public static function getSoftcardCategories($id){
        $categories = Softcard::find($id)->categories()
                                    ->where('product_type','softcard')
                                    ->orderBy('sort_order','ASC')
                                    ->pluck('category_id')
                                    ->toArray();
        return $categories;
    }

    public static function getGroupsUser(){
        $groups = app('App\Modules\Group\Models\Group')::all();
        return $groups;
    }

    public static function getCurrencies(){
        $currencies = app('App\Modules\Currency\Models\Currencies')::where('status',1)
                                                                ->where('fiat',1)
                                                                ->get();
        return $currencies;
    }

    public static function deleteSoftcardItems($items){
        foreach ($items as $key => $item) {
            /* delete discounts of item */
            $values = SoftcardDiscount::where('item_id',$item->id)->delete();

            /* delete item */
            $deleted = SoftcardItem::find($item->id)->delete();
        }
        return true;
    }

    public static function deleteSoftcardGallery($gallery){
        foreach ($gallery as $key => $image) {
            /* delete image file */
            Storage::delete($image->value);

            /* delete gallery */
            $img = SoftcardGallery::find($image->id)->delete();
        }
        return true;
    }

    public static function getCategories($cid=array()){
        $cateList = app('App\Modules\Categories\Controllers\CategoriesController')::getCateListArray();
        $selectHtml = app('App\Modules\Categories\Controllers\CategoriesController')::buildSelectParent($cateList,$cid);
        return $selectHtml;
    }

}