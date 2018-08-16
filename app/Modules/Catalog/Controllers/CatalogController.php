<?php

namespace App\Modules\Catalog\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use App\Modules\Catalog\Models\Catalog;

class CatalogController extends BackendController
{

	public function index(Request $request)
	{
		
		$title    = "Catalog Management";
		$catalogs = Catalog::orderBy('id','DESC')->paginate(10);
		if($request->input('keyword'))
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $catalogs = Catalog::where('name', 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
        }
		return view("Catalog::index", compact('title','catalogs'));
	}


	public function create()
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$title    = "Catalog Management";
            return view('Catalog::create',compact('title'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

	public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|unique:catalogs,url'
        ]);


        $input = $request->all();
        if(isset($input['public']))
        {
        	$input['public'] = 1;
        }else{
        	$input['public'] = 0;
        }
        $user = Catalog::create($input);
        return redirect()->route('catalogs.index')
                        ->with('success','catalog created successfully');
    }

    public function edit($id)
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$title    = "Catalog Management";
        	$catalog  = Catalog::find($id);
            return view('Catalog::edit',compact('title','catalog'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

	public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|unique:catalogs,url,'.$id,
        ]);

        $catalog = Catalog::find($id);
        if(isset($request->public))
        {
        	$catalog->public = 1;
        }else{
        	$catalog->public = 0;
        }
        $catalog->name = $request->name;
        $catalog->url  = $request->url;
        $catalog->description = $request->description;
        $catalog->save();
        return redirect()->route('catalogs.index')
                        ->with('success','catalog updates successfully');
    }

    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	Catalog::find($id)->delete();
            return redirect()->route('catalogs.index')
                        ->with('success','Catalog deleted successfully');
        }else{
            return redirect()->route('catalogs.index')
                        ->withErrors(['message' =>'Not access.']);
        }
    }

}