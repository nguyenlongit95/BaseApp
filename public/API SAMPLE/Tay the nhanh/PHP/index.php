<html>
<head>
	<title>Card charging</title>
	<meta charset="utf-8">
</head>
<body>

<form class="form_action" action="postcard.php" style="width:500px;margin:20px auto" accept-charset="UTF-8" method="post">
     <p>
         <select name="telco">
             <option>Nhà mạng:</option>
              <option value="VIETTEL" selected>VIETTEL</option>
			  <option value="VINAPHONE">VINAPHONE</option>
			  <option value="MOBIFONE">MOBIFONE</option>
         </select>
     </p>
	      <p>
         <select name="value">
              <option>Mệnh giá:</option>
              <option value="100000" selected>100.000</option>
              <option value="200000">200.000</option>
              <option value="500000">500.000</option>
              <option value="100000">100.000</option>
          </select>
     </p>
     <p>
         <input type="text" name="code" placeholder="Mã thẻ:" value="99999999" >
     </p>
     <p>
          <input type="text" name="serial" placeholder="Serial:" value="66666666">
     </p>
     <button type="submit">Đổi thẻ cào</button>
</form>
</body>
</html>
