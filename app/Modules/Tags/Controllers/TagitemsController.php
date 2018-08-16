<?php

namespace App\Modules\Tags\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use App\Modules\Tags\Models\Tagitems;

class TagitemsController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $title = 'Tag Items';
        View::share ('title', $title );
    }

	public function index(Request $request)
	{
		$items = Tagitems::orderBy('id','DESC')->paginate(10);
		if($request->input('keyword'))
        {   
            $keyword = $request->input('keyword');
            $typeSearch = $request->input('type');
            $title  = "Search: ";
            if($typeSearch!=''){
                switch ($typeSearch) {
                    case 'tag_id':
                        $title .= 'Tag Id = ';
                        break;
                    case 'item_id':
                        $title .= 'Item Id = ';
                        break;
                    default:
                        $title .= 'Item Type = ';
                        break;
                }
                if($typeSearch=='type')
                    $items = Tagitems::where($typeSearch, 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
                else
                    $items = Tagitems::where($typeSearch, $keyword)->orderBy('id','DESC')->paginate(10);
            }else{
                $items = Tagitems::where('tag_id',$keyword)
                                ->orwhere('item_id', $keyword)
                                ->orwhere('type', 'LIKE', '%'.$keyword.'%')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            }
            $title .= $keyword;
        }
		return view("Tags::item_index", compact('title','items'));
	}

    public function edit($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$item  = Tagitems::find($id);
            return view('Tags::item_edit',compact('item'));
        }else{
            echo 'Not Access';
            return ;
        }
    }

	public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'tag_id' => 'required',
            'item_id' => 'required',
            'type' => 'required',
        ]);

        $item = Tagitems::find($id);
        $item->tag_id = $request->tag_id;
        $item->item_id = $request->item_id;
        $item->type = $request->type;;
        $item->save();
        return redirect()->route('tagitems.index')
                        ->with('success','Tag Item Updated Successfully');
    }

    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	Tagitems::find($id)->delete();
            return redirect()->route('tagitems.index')
                        ->with('success','Tag Item Deleted Successfully');
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
            return redirect()->route('tagitems.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $tag = Tagitems::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('tagitems.index')->with('success','Tags '.$action.' Successfully');
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

    public static function createTagItems($tagId,$itemId,$type){
        $item = new Tagitems;
        $item->tag_id = $tagId;
        $item->item_id = $itemId;
        $item->type = $type;;
        $item->save();
        return $item;
    }

    public static function deleteTagItems($tagId,$itemId,$type){
        Tagitems::where('tag_id',$tagId)
                ->where('item_id',$itemId)
                ->where('type',$type)
                ->delete();
        return true;
    }

    public static function deleteAllTagItems($colName,$value){
        Tagitems::where($colName,$value)
                ->delete();
        return true;
    }
}