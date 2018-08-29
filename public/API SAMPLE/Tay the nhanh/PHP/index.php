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
			  <option value="VINA">VINAPHONE</option>
			  <option value="MOBIFONE">MOBIFONE</option>
         </select>
     </p>
     <p>Mã thẻ:</p>
     <p>
         <input type="text" name="code" placeholder="Mã thẻ:" value="11234198709" >
     </p>
     <p>Số serial:</p>
     <p>
          <input type="text" name="serial" placeholder="Serial:" value="4234234234">
     </p>
     <button type="submit">Đổi thẻ cào</button>
</form>
</body>
</html>
