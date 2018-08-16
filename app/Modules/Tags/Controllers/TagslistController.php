<?php

namespace App\Modules\Tags\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use App\Modules\Tags\Models\Tagslist;

class TagslistController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $title = 'Tags List';
        View::share ('title', $title );
    }

	public function index(Request $request)
	{
		$tags = Tagslist::orderBy('id','DESC')->paginate(10);
		if($request->input('keyword')!='')
        {
            $keyword = $request->input('keyword');
            $title  = "Search: ".$keyword;
            $typeSearch = $request->input('type');
            $title  = "Search: ";
            if($typeSearch!==''){
                switch ($typeSearch) {
                    case 'code':
                        $title .= 'Tag Code = ';
                        break;
                    case 'description':
                        $title .= 'Description = ';
                        break;
                    case 'author':
                        $title .= 'Author = ';
                        break;
                    case 'status':
                        $title .= 'Status = ';
                        break;
                    default:
                        $title .= 'Tag Label = ';
                        break;
                }
                if($typeSearch=='status')
                    $tags = Tagslist::where($typeSearch, $keyword)->orderBy('id','DESC')->paginate(10);
                else
                    $tags = Tagslist::where($typeSearch, 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
            }else{
                $tags = Tagslist::where('code', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('label', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('description', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('author', 'LIKE', '%'.$keyword.'%')
                                ->paginate(10);
            }
            $title .= $keyword;
        }
		return view("Tags::list_index", compact('title','tags'));
	}


	public function create()
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
	        $author = auth()->user()->name;
            return view('Tags::list_create', compact('author'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:tags,code',
            'label' => 'required',
        ]);

        $input = $request->all();
        $tag = Tagslist::create($input);
        return redirect()->route('tagslist.index')
        				->with('success','Tag created successfully');
    }

    public function edit($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$tag  = Tagslist::find($id);
            return view('Tags::list_edit',compact('tag'));
        }else{
            echo 'Not Access';
            return ;
        }
    }

	public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'code' => 'required|unique:tags,code',
            'label' => 'required',
        ]);

        $tag = Tagslist::find($id);
        $tag->code = $request->code;
        $tag->label = $request->label;
        $tag->description = $request->description;;
        $tag->status = $request->status;;
        $tag->save();
        return redirect()->route('tagslist.index')
                        ->with('success','Tag updated successfully');
    }

    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	Tagslist::find($id)->delete();
            app('App\Modules\Tags\Controllers\TagitemsController')::deleteAllTagItems('tag_id',$id);
            return redirect()->route('tagslist.index')
                        ->with('success','Tag deleted successfully');
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
            return redirect()->route('tagslist.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $tag = Tagslist::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('tagslist.index')->with('success','Tags '.$action.' successfully');
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

    public static function createNewTags($new_tags){
        $result = array();
        $tags = explode(',',$new_tags);
        print_r($tags);
        foreach ($tags as $tag) {
            if($tag!=''){
                $tag_slug = trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($tag)), '-');
                // print_r($tag_slug);
                $counterExists = Tagslist::where('code', 'LIKE', '%'.$tag_slug.'%')->get();
                // print_r(count($counterExists));
                if(count($counterExists)){
                    $tag_slug .= '-'.count($counterExists);
                }
                $newTag = new Tagslist;
                $newTag->code = $tag_slug;
                $newTag->label = trim($tag);
                $newTag->description = trim($tag);
                $newTag->author = auth()->user()->name;
                $newTag->save();
                $result[] = $newTag->id;
            }
        }
        return $result;
    }
}