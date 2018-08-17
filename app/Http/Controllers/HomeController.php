<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home");
    }

    public function test()
    {

        return $this->makeConnection();
    }

    public function makeSignature($secretAccessKey, $body )
    {
       return base64_encode(hash_hmac("sha1",$body, $secretAccessKey,  TRUE));
    }

    public function generateAuth()
    {

        $url = 'https://api2.sandbox.octa.vn/api/v3/GenarateAuth';
        $ch = curl_init( $url );
        $string = '{"Request":{"User":{"UserName":"apitest2","Password":"0123456789","Captcha": null},"Data":{"RequestDate": "2018-08-14T15:34:48.1243810+07:00"}}}';
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $string );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);

        print_r($result);

    }

    public function makeConnection()
    {
        $accesskey = 'a05e1ac0-87c8-4598-a437-090dd3c9f313';
        $secretAccessKey = '1aa2d6a0495b600d0cc8edddc1bfc159b26a2f37';
        $body = '{"Request":{"Data":{"ReceiptNumber":"order-123","ServiceCode":"GATE10","Price":10000,"Amount": 2,"RequestDate": "2018-08-14T16:35:02.2095738+07:00"}}}';
        $signature =  $this->makeSignature($secretAccessKey, $body);
        //echo $signature;
        //exit();
        $header[] = 'Content-Type:application/json';
        $header[] = 'ECOPAY a05e1ac0-87c8-4598-a437-090dd3c9f313: I8TqJ8JT5WBArnV9hLOI2mzLMPI=';
        $header[] = 'Content-Length: 0';

        $ch = curl_init('https://api2.sandbox.octa.vn/api/v3/PayCode');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header );
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);

        print_r($result);
    }

    public function muaMaThe()
    {
        $string = '{"Request":{"Data":{"ReceiptNumber":"c3c470e1-d12c-49c3-aec8d6123b8daf44","ServiceCode":"GATE10","Price":10000,"Amount": 2,"RequestDate": "2017-05-28T23:43:14.6195919+07:00"}}}';
        $ch = curl_init('https://api2.sandbox.octa.vn/api/v3/PayCode');
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $string );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ECOPAY '.$accessKey.': '.$signature));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);

        print_r($result);
    }

    public function runCurl($url, $body)
    {
        $accesskey = 'a05e1ac0-87c8-4598-a437-090dd3c9f313';
        $secretAccessKey = '1aa2d6a0495b600d0cc8edddc1bfc159b26a2f37';
        //$body = '{"Request":{"Data":{"ReceiptNumber":"order-123","ServiceCode":"GATE10","Price":10000,"Amount": 2,"RequestDate": "2018-08-14T16:35:02.2095738+07:00"}}}';
        $signature =  $this->makeSignature($secretAccessKey, $body);

        $header[] = 'Content-Type:application/json';
        $header[] = 'Authorization: ECOPAY : '.$accesskey.':'.$signature;
        $header[] = 'Content-Length: 0';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header );
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }






}
