<?php
/**
 * Created by PhpStorm.
 * User: nguyenlongit95
 * Date: 8/21/18
 * Time: 2:13 PM
 */

namespace App\Modules\AutoCharging\Models;

use Illuminate\Database\Eloquent\Model;

class AutoChargingSetting extends Model {
    protected $table="autochargings_setting";

    protected $filltable=[
        "id",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "meta_page_title",
        "page_title",
        "description"
    ];
}
?>
