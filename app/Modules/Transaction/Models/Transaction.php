<?php
namespace App\Modules\Transaction\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaction extends Model
{
	protected $table = 'transactions';
	protected $fillable = [
       'transaction_code','description','amount','fees','total','admin_note','paygate','currency_id','currency_code','from_wallet','to_wallet','checksum','status','creator','creator_info','expired_at','ipaddress'
    ];

}
