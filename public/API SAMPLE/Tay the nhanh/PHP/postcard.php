<?php

    include 'AutoCharging.php';

    $api = new AutoCharging();

    // Gui du lieu len cho AutoCharging de gui len phia nha mang
    $telco	    = $_POST['telco'];
	$code	    = $_POST['code']; // ma the
    $serial		= $_POST['serial']; //serial the
	$value	    = $_POST['value'];
    $request_id = 	'7884545454';   /// Đây có thể là mã đơn hàng của bạn

    $result = $api->check_card($telco, $code, $serial, $value, $request_id);

    //Xử lý kết quả trả về từ nhà cung cấp

    if(isset($result->status) && $result->status == '0')
    {
        $amount     = $result->amount; //mệnh giá thẻ
        $telco        = $result->telco; //Loại thẻ
        $serial     = $result->serial; //serial
        $code       = $result->code; //mã thẻ
        $request_id =  $result->amount; //request_id ma đối tác gửi sang
        $transid    = $result->transid; //mã giao dịch bên key24h.com

        echo 'Bạn đã nạp thành công thẻ '.$key .' mệnh giá '.number_format($amount).' đ';
    }
    //có lỗi
    else
    {
        echo isset($result->message) ? $result>message : 'Loi khong xac dinh';
    }

?>
