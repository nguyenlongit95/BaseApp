<?php

namespace App\Modules\Product\Controllers;

use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use App\Modules\Product\Models\Product;
use App\Modules\Catalog\Models\Catalog;

class ProductController extends BackendController
{

	public function index()
	{

		$title    = "Products Management";
		$products = Product::orderBy('id','DESC')->paginate(10);
		return view("Product::index", compact('title','products'));
	}

	public function create()
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$title    = "Product Management";
        	$catalogs = Catalog::orderBy('id','DESC')->get();
        	foreach($catalogs as $catalog)
        	{
        		$lsCat[$catalog->id]  = $catalog->name;
        	}
            return view('Product::create',compact('title', 'catalogs', 'lsCat'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'name'  => 'required',
            'url'   => 'required|unique:products,url',
            'catalog'=> 'exists:catalogs,id|numeric',
            'order' => 'numeric'

        ]);
        $input = $request->all();
        if(isset($input['public']))
        {
        	$input['public'] = 1;
        }else{
        	$input['public'] = 0;
        }
        Product::create($input);
        return redirect()->route('products.index')->with('success','Product is created');
	}

	public function edit($id)
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
			$title    = "Products Management";
			$product = Product::find($id);
			$catalogs = Catalog::orderBy('id','DESC')->get();
			foreach($catalogs as $catalog)
        	{
        		$lsCat[$catalog->id]  = $catalog->name;
        	}
        	$image       = \App\MYHelper::img($product->image,150);
        	$image_other = \App\MYHelper::img($product->image_other,150);
			return view("Product::edit", compact('title','product','lsCat', 'image_other','image'));
		}else{
            echo 'Not Access';
            return ;
        }
	}
	public function update(Request $request,$id)
	{
		$this->validate($request, [
            'name' => 'required',
            'url' => 'required|unique:products,url,'.$id,
            'catalog'=> 'exists:catalogs,id|numeric',
            'order' => 'numeric'
        ]);

        $product = Product::find($id);
        if(isset($request->public))
        {
        	$product->public = 1;
        }else{
        	$product->public = 0;
        }
        $product->name = $request->name;
        $product->url  = $request->url;
        $product->catalog = $request->catalog;
        $product->image = $request->image;
        $product->image_other = $request->image_other;
        $product->order = $request->order;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')
                        ->with('success','Product updates successfully');
	}

	public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	Product::find($id)->delete();
            return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
        }else{
            return redirect()->route('products.index')
                        ->withErrors(['message' =>'Not access.']);
        }
    }
}