<?php
/**
 * Created by PhpStorm.
 * User: nguyenlongit95
 * Date: 8/31/18
 * Time: 4:47 PM
 */


namespace App\Modules\AutoCharging\Models;
use Illuminate\Database\Eloquent\Model;

class AutoChargingProvider extends Model
{
    protected $table="autochargings_providers";

    protected $fillable = [
        'id','NameProvider','idTelco','config'
    ];
}
?>
