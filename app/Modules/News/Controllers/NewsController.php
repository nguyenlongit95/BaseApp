<?php

namespace App\Modules\News\Controllers;

use Illuminate\Http\Request;

use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use App\Modules\News\Models\News;

class NewsController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $title = 'News Management';
        View::share ('title', $title );
    }

	public function index(Request $request)
	{
        $news = News::orderBy('id','DESC')->paginate(10);
        if($request->input('keyword')!='')
        {
            $keyword = $request->input('keyword');
            $typeSearch = $request->input('type');
            $title  = "Search: ";
            if($typeSearch!==''){
                switch ($typeSearch) {
                    case 'author':
                        $title .= 'Author = ';
                        break;
                    case 'language':
                        $title .= 'Language = ';
                        break;
                    case 'status':
                        $title .= 'Status = ';
                        break;
                    default:
                        $title .= 'Title = ';
                        break;
                }
                if($typeSearch=='status')
                    $news = News::where($typeSearch, $keyword)->orderBy('id','DESC')->paginate(10);
                else
                    $news = News::where($typeSearch, 'LIKE', '%'.$keyword.'%')->orderBy('id','DESC')->paginate(10);
            }else{
                $news = News::where('title', 'LIKE', '%'.$keyword.'%')
                                ->orwhere('author', 'LIKE', '%'.$keyword.'%')
                                ->orwhere('language', 'LIKE', '%'.$keyword.'%')
                                // ->orwhere('status', $keyword)
                                ->orderBy('id','DESC')
                                ->paginate(10);
            }
            $title .= $keyword;
        }

        return view("News::index", compact('title','news'));
	}


	public function create()
	{
		if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
	        $author = auth()->user()->name;
	        $author_email = auth()->user()->email;
            // $roles = Role::pluck('name','name')->all();
			$languages = $this->listLanguage();
            $tags = app('App\Modules\Tags\Models\Tagslist')->get(array('id','code','label'));
            return view('News::create', compact('author','author_email','languages','tags'));
        }else{
            echo 'Not Access';
            return ;
        }
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            // 'url_key' => 'required',
            // 'short_description' => 'required',
            'content' => 'required',
            // 'author' => '',
            // 'author_email' => '',
            // 'language' => 'required',
            // 'custom_layout' => '',
            // 'status' => 'required',
            // 'view_count' => '',
            // 'publish_date' => '',
            // 'created_at' => '',
            // 'updated_at' => '',
        ]);

        $input = $request->all();
        if(!isset($input['url_key'])) $input['url_key'] = str_slug($input['title']);
        // if(!isset($input['language']) $input['language'] = 'en';
        // if(!isset($input['custom_layout']) $input['custom_layout'] = 0;
        // $input['author'] = auth()->user()->name;
        // $input['author_email'] = auth()->user()->email;
        // if(!isset($input['status'])) $input['status'] = 1;
        $news = News::create($input);

        /** save news tags **/
        $new_tags = array();
        $module_type = config('tags.type.news.id');
        $new_tags = $request->tags;
        if($request->new_tags && $request->new_tags!=''){
            $new_tags_ids= app('App\Modules\Tags\Controllers\TagslistController')::createNewTags($request->new_tags);
            $new_tags = array_merge($new_tags,$new_tags_ids);
        }
        if(count($new_tags)>0){
            foreach ($new_tags as $tag_id) {
                $new_item = app('App\Modules\Tags\Controllers\TagitemsController')::createTagItems($tag_id,$news->id,$module_type);
            }
        }
        /** end save news tags **/

        return redirect()->route('news.index')
        				->with('success','News created successfully');
    }

    public function edit($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	$news  = News::find($id);
			$languages = $this->listLanguage();
            $tags = app('App\Modules\Tags\Models\Tagslist')->get(array('id','code','label'));
            $selected_tags = app('App\Modules\Tags\Models\Tagitems')->where('item_id',$id)
                                ->where('type',config('tags.type.news.id'))
                                ->groupBy('tag_id')
                                ->pluck('tag_id')
                                ->toArray();
            return view('News::edit',compact('news','languages','tags','selected_tags'));
        }else{
            echo 'Not Access';
            return ;
        }
    }

	public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        $input = $request->all();
        $news = News::find($id);
        $news->title = $request->title;
        if(!isset($request->url_key))
        	$news->url_key = str_slug($input['url_key']);
        else
        	$news->url_key =  $request->url_key;
        $news->short_description = $request->short_description;
        $news->content = $request->input['content'];
        $news->language = $request->language;
        $news->view_count = $request->view_count;
        // $news->custom_layout = $request->custom_layout;
        $news->status = $request->status;
        $news->publish_date = $request->publish_date;
        $news->save();

        /** save news tags **/
        $new_tags = array();
        $delete_tags = array();
        $module_type = config('tags.type.news.id');
        $selected_tags = app('App\Modules\Tags\Models\Tagitems')->where('item_id',$id)
                            ->where('type',config('tags.type.news.id'))
                            ->groupBy('tag_id')
                            ->pluck('tag_id')
                            ->toArray();
        if(count($selected_tags)>0){
            if($request->tags && count($request->tags)>0){
                $delete_tags = array_diff($selected_tags, $request->tags);
                $new_tags = array_diff($request->tags,$selected_tags);
            }else{
                $delete_tags = $request->tags;
            }
        }else{
            if($request->tags)
                $new_tags = $request->tags;
        }
        if($request->new_tags && $request->new_tags!=''){
            $new_tags_ids= app('App\Modules\Tags\Controllers\TagslistController')::createNewTags($request->new_tags);
            $new_tags = array_merge($new_tags,$new_tags_ids);
        }
        if(count($delete_tags)>0){
            foreach ($delete_tags as $tag_id) {
                app('App\Modules\Tags\Controllers\TagitemsController')::deleteTagItems($tag_id,$id,$module_type);
            }
        }
        if(count($new_tags)>0){
            foreach ($new_tags as $tag_id) {
                $new_item = app('App\Modules\Tags\Controllers\TagitemsController')::createTagItems($tag_id,$id,$module_type);
            }
        }
        /** end save news tags **/

        return redirect()->route('news.index')
                        ->with('success','News updated successfully');
    }

    public function destroy($id)
    {
        if( auth()->user()->hasRole('SUPER_ADMIN|ADMIN') )
        {
        	News::find($id)->delete();
            app('App\Modules\Tags\Controllers\TagitemsController')::deleteAllTagItems('item_id',$id);
            return redirect()->route('news.index')
                        ->with('success','News deleted successfully');
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
            return redirect()->route('news.index')->withErrors(['message' =>'Không có mục nào được chọn.']);
        }

        foreach ($val as $value) {
            $news = News::find($value);
            $this->_runAction($value, $action);
        }
        return redirect()->route('news.index')->with('success','News  '.$action.'successfully');
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

	public function listLanguage()
	{
		$langpath = resource_path('lang');
		$langlist =   glob($langpath . '/*' , GLOB_ONLYDIR);
		$lang = array();
		foreach ($langlist as $value) {
			$temp = str_replace($langpath.'/', '', $value);
			$lang[$temp] = $temp;
		}
		return $lang;
	}

}
