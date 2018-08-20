<?php

namespace App\Modules\AutoCharging\Controllers;

use App\Modules\AutoCharging\Models\AutoChargingFees;
use App\Modules\AutoCharging\Models\AutoChargingSetting;
use App\Modules\Wallet\Models\Wallet;
use Illuminate\Http\Request;
use App\Modules\Frontend\Controllers\FrontendController;
use Auth;
use DB;
use App\User;
use App\Modules\AutoCharging\Models\AutoCharging;
use App\Modules\AutoCharging\Models\AutoChargingsTelco;
use App\Modules\Group\Models\Group;
use App\Modules\Merchant\Models\Merchant;

class AutoChargingApiController extends FrontendController
{
    public $client_ip;

    function __construct(Request $request)
    {

    }

    public function blankPage() {
        return 'Không có quyền truy cập!';
    }
    public function postApiCharging(Request $request) {
        $this->client_ip = $request->ip();
        $postdata = $request->all();
        /// Kiểm tra các thông tin post lên
        $user = $this->checkUser($postdata);
        $datacard['telco'] = $postdata['telco'];
        $datacard['code'] = $postdata['code'];
        $datacard['serial'] = $postdata['serial'];
        $datacard['value'] = $postdata['value'];
        $datacard['request_id'] = $postdata['request_id'];

        //dd($datacard);

        if($user) {
            $response = $this->insertApiCharging($datacard, $user->id, 'API');

            if($response) {
                /// Trả kết quả cho client
               return $this->set_output($response);

            }

        }

    }

    public function getCheckStatus($trans_id, $request_id){

        $response = Charging::where(['id'=>$trans_id, 'request_id' => $request_id])->firstOrFail();

        if(!$response) {
                $result['status']   = 120;
                $result['message']  = 'Thẻ không tồn tại trên hệ thống';
                $this->set_output($result);
        } else {

            if($response->status == 1) {
                $resultoutput = [
                    'trans_id' => $response->id,
                    'request_id' => $response->request_id,
                    'status' => $response->status,
                    'message' => $response->description,
                    'telco' => $response->telco,
                    'code' => $response->code,
                    'serial' => $response->serial,
                    'declare_amount' => $response->declared_value,
                    'real_amount' => $response->real_value,
                    'net_amount' => $response->amount,
                ];
            } else {

                $resultoutput = [
                    'trans_id' => $response->id,
                    'request_id' => $response->request_id,
                    'status' => 99,
                    'message' => 'Thẻ đang chờ xử lý',

                ];
            }

            return $this->set_output($resultoutput);
        }

    }

    private function checkUser($postdata){

        /// Kiểm tra thông tin merchant
        if(!isset($postdata['partner_id']) || !isset($postdata['sign']))
        {
            $result['status']   = 10;
            $result['message']  = 'Không có dữ liệu về Merchant';
            $this->set_output($result);
        }
        /// Kiểm tra trang thái của Merchant thông qua partner_id
        $merchant = Merchant::where('partner_id', $postdata['partner_id'])->first();

        if(!$merchant){
            $result['status']   = 20;
            $result['message']  = 'Merchant không tồn tại';
            $this->set_output($result);
        }

        if($merchant->status != 1){
            $result['status']   = 30;
            $result['message']  = 'Merchant không hoạt động';
            $this->set_output($result);
        }
        /// Kiểm tra chữ ký
        if(!$this->checkSign($postdata)) {
            $result['status']   = 40;
            $result['message']  = 'Sai chữ ký';
            $this->set_output($result);
        }
        /// Kiểm tra IP nếu merchant đc khai báo dài IP
        if($merchant->ips){
            $allow_ip = explode(',', $merchant->ips);
            foreach ($allow_ip as $ip)
            {
                $allow_ip[] = trim($ip);
            }

            if(!in_array($this->client_ip, $allow_ip)){
                $result['status']   = 50;
                $result['message']  = 'Merchant sai IP đăng ký';
                $this->set_output($result);
            }
            unset($merchant);
        }

        /// Kiểm tra trạng thái thành viên
        $user = User::find($merchant->user);
        if(!$user || $user->status != 1) {
            $result['status']   = 60;
            $result['message']  = 'Tài khoản thành viên không hoạt động';
            $this->set_output($result);
        }

        /// Kiểm tra trạng thái ví nhận tiền
        $wallet = Wallet::where('number', $merchant->wallet_num)->first();
        if(!$wallet){
            $result['status']   = 70;
            $result['message']  = 'Địa chỉ ví không tồn tại';
            $this->set_output($result);
        }else {
            if($wallet->status != 1){
                $result['status']   = 80;
                $result['message']  = 'Địa chỉ ví không hoạt động';
                $this->set_output($result);
            }

            if($wallet->currency_code != 'VND'){
                $result['status']   = 90;
                $result['message']  = 'Loại ví của Merchant không phải là VND';
                $this->set_output($result);
            }
        }

        //// Kiểm tra phần tử dữ liệu post lên
        if(!$this->checkCardData($postdata)){
            $result['status']   = 100;
            $result['message']  = 'Thông tin gửi lên không đúng chuẩn định dạng';
            $this->set_output($result);
        }
        return $user;
    }


    private function set_output($result)
    {
        $result = json_encode($result);
        return $result;
        exit();
    }

    private function checkSign($params){
        $merchant = Merchant::where('partner_id', $params['partner_id'])->first();
        $system_sign = md5($merchant->partner_id.$merchant->partner_key.$params['telco'].$params['code'].$params['serial'].$params['value'].$params['request_id']);

        if($system_sign == $params['sign']){
            return true;
        }else {

            return false;
        }

    }

    public function checkCardData($data){

        if(!isset($data['partner_id']) || !isset($data['code']) || !isset($data['serial']) ||
            !isset($data['value']) || !isset($data['telco']) || !isset($data['request_time']) ||
            !isset($data['request_id']) || !isset($data['sign'])){

            return false;
        }else {
            return true;
        }
    }


    private function insertApiCharging($data, $user_id, $api_provider = NULL) {

        $result = \App\Modules\Charging\Controllers\ChargingController::insertChargebyUser($data, $user_id, $api_provider);
        if(!$result) {
            $result['status']   = 110;
            $result['message']  = 'Lỗi nhập dữ liệu';
            $this->set_output($result);

        }
        return $result;
    }









}
