<?php

namespace App\Modules\Setting\Controllers;

use Illuminate\Http\Request;
use App\Modules\Backend\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Auth;
use View;
use App\Modules\Setting\Models\Setting;
use App\Modules\Setting\Helpers\SettingHelper;

class SettingController extends BackendController
{
	public $general_arr =  ['favicon', 'logo', 'backendlogo', 'name','title', 'description', 'language', 'phone', 'hotline','email','facebook','googleplus','twitter','backendname','backendlang','copyright', 'timezone','websitestatus','address'];



	public function general()
	{
		$title     = "Settings General";
		$timezone  = $this->arrayTimezone();
		$languages = $this->listLanguage();
		$setting = array();
		foreach($this->general_arr as $key)
		{
			$obj = Setting::where('key',$key)->first();
			if(is_object($obj))
				$setting[$key] = $obj->value;
		}
		$setting['favicon_link'] = SettingHelper::img($setting['favicon'],150);
		$setting['logo_link'] = SettingHelper::img($setting['logo'],150);
		$setting['backendlogo_link'] = SettingHelper::img($setting['backendlogo'],150);

		return view('Setting::index', compact('title','setting', 'timezone', 'languages'));
	}

	public function update_general(Request $request)
	{
		$input = $request->all();
		foreach($this->general_arr as $key)
		{
			if(isset($input[$key]))
			{
				$set = Setting::where('key',$key);
				if($set->count()){
					$set->update(['value'=>$input[$key]]);
				}else{
					$set->create(['key'=>$key,'value'=>$input[$key]]);
				}
			}
		}
		return redirect(url(config('backend.backendRoute').'/settings/general'))->with('success','Setting general Updated')->withInput();
	}

	public function arrayTimezone()
	{
		$timezone = view('Setting::timezone')->render();
		return json_decode($timezone);
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