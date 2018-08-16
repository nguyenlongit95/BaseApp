<?php
namespace App\Modules\News\Controllers;

use App\Modules\Frontend\Controllers\FrontendController;
use Illuminate\Http\Request;
use Session;
use App;

use App\Modules\News\Models\News;

class NewsFrontController extends FrontendController{

    public function __construct(){
        parent::__construct();
	}

	public function index(){
		if(App::getLocale())
			$locale = App::getLocale();
		else
			$locale = 'vi';
		$news = News::where('language','=',$locale)
					->where('status',1)
					->orderBy('created_at','DESC')
					->paginate(5);
		
		return view('frontend.pages.tintuc',compact('news'));
	}

	public static function getListNews($locale='vi',$limit=10){
		$news = News::where('language','=',$locale)
					->where('status',1)
					->limit($limit)
					->orderBy('created_at','DESC')
					->get();

		return $news;
	}

	public static function renderViewPage(Request $request){
		if(App::getLocale())
			$locale = App::getLocale();
		else
			$locale = 'vi';
		$news = News::where('language','=',$locale)
					->where('url_key','=',$request->url_key)
					->where('status',1)
					->first();
		if($news){
			if(!Session::has('view_count')){
				$news->view_count = $news->view_count +1;
				$news->save();
				Session::put('view_count',true);
			}
			$tags = static::getNewsTags($news->id);
	        return view('frontend.pages.chitiet',compact('news','tags'));
        }else{
        	return abort(404);
        }
	}

	public static function getNewsTags($newsId){
		$selected_tags = app('App\Modules\Tags\Models\Tagitems')->where('item_id',$newsId)
	                        ->where('type',config('tags.type.news.id'))
	                        ->groupBy('tag_id')
	                        ->pluck('tag_id')
	                        ->toArray();
	    $tags = app('App\Modules\Tags\Models\Tagslist')->whereIn('id',$selected_tags)->get();
	    return $tags;
	}
}