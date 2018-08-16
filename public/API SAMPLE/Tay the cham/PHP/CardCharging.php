<?php
class CardCharging {
	
	// Api url
	const URL_POST = 'http://localhost/laravelfull/public/chargingws.html';
	protected $partner_id    = '8235324351'; //do bên API cap
	protected $partner_key 	= '0d70fa5e283408c80b6a303f886117e1'; //do bên API cap


	/**
	 * Lấy các loại thẻ từ nhà mạng cung cấp
	 */
	public function get_card_keys()
	{
	    $params = new stdClass();
	    // Set api config
		$params->PartnerID    = $this->_PartnerID;
		$params->PartnerKey   = $this->_PartnerKey;
		
		// Request to api
		$url = self::URL_POST . '/get_card_keys.html';
		
		$res = $this->_curl($url, $params);
	
		$res = @base64_decode($res);
		
		$res = @json_decode($res);

		return $res;
	}
	

	////Kiểm tra mã thẻ

	public function check_card($telco, $code, $serial, $value, $request_id)
	{
		$params = new stdClass();
		$params->telco 	    = trim($telco);
		$params->code 	    = trim($code);
		$params->serial 		= trim($serial);
		$params->value 		= trim($value);
		$params->request_id 	= trim($request_id);
		
		$params->partner_id    = $this->partner_id;
		$params->partner_key    = $this->partner_key;
		$params->request_time =  date("YmdHis", time());
		$params->sign = md5($params->partner_id.$params->partner_key.$params->telco.$params->code.$params->serial.$params->value.$params->request_id);
		
		return $this->_exec($params);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Send data to the API end received response
	 * @param array		$params		Params that will be send
	 */
	protected function _exec($params)
	{
		// Post dữ liệu lên nhà cung cấp
		$url = self::URL_POST;
		
		//var_dump($params); die();
		$result = $this->_curl($url, $params);
		
		//// Nhận kết quả trả về
		$result = @base64_decode($result);
		$result = @json_decode($result);

		return $result;
	}
	
	
	// --------------------------------------------------------------------
	
	/**
	 * Send data to the server end received response
	 * @param string 	$url	URL send request
	 * @param array 	$data	Data that will be send
	 */
	protected function _curl($url, $data)
	{
		// Check curl library
		if ( ! function_exists('curl_init'))
		{
			exit('Curl library not installed.');
		}
		
		// Set options
    	$opts = array();
        $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31';
        $opts[CURLOPT_HEADER] = false;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_TIMEOUT] = 15;
        $opts[CURLOPT_POST] = true;
        $opts[CURLOPT_POSTFIELDS] = http_build_query($data);

	  	if (preg_match('#^https:#i', $url))
        {
     		$opts[CURLOPT_SSL_VERIFYPEER] = FALSE;
        	$opts[CURLOPT_SSL_VERIFYHOST] = 0;
        	$opts[CURLOPT_SSLVERSION] = 3;
        }
        
		// Init curl
		$curl = curl_init();
		curl_setopt_array($curl, $opts);
		$res = curl_exec($curl);
		
		var_dump($res); die();
		
		if (
			curl_errno($curl) ||
			curl_getinfo($curl, CURLINFO_HTTP_CODE) != 200
		)
		{
			return false;
		}
		
		
		return $res;
	}
	
}


/**
 * Card_charging Exception class
 */
if ( ! class_exists('Card_charging_Exception'))
{
	class Card_charging_Exception extends Exception {}
}

