<?php
	session_start() ;
	$_SESSION [ 'sure' ] = false ;
?>
<html>
 <head><meta charset = "big5"><title></title></head>
  <body bgcolor = "black">
	<h1 align = "center" style = "color:white">IP查詢列表</h1><hr>
	<p align = "center" style = "color:white">請選擇寢室資訊</p>
	<p style = "color:white">查IP設定</p>
	<?php
		if ( $_SESSION [ 'sure' ] == true ){
			
			
		}
	?>
	<form method = "post" >
	 <p style = "color:white">宿舍棟別 : 
	 <select>
	  <option selected = "selected" >-- 請選擇 --</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="A">A</option>
	  <option value="B">B</option>
	  <option value="C">C</option>
	  <option value="D">D</option>
	  <option value="E">E</option>
	  <option value="F">F</option>
	  <option value="G">G</option>
	  <option value="H">L</option>
	  <option value="H">L</option>
	 </select>
	 <p style = "color:white">寢室房號 :
	  <input type = "text" name = "room" size = "3" />
	 </p>
	 <p style = "color:white">寢室床號 :
	  <select name="bed">
	  <option value="" selected="selected">--請選擇--</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  </select>
	 </p>
	 <input type="submit" value="開始查詢" id="start" />
	 <input name="reset" value="重新選擇" type="reset" />
	</form>
	<?php
		if (isset($_POST[ 'room' ])){
			$_SESSION[ 'sure' ]=true ;
			echo "床位 : F102-1</br>IP位址 : 140.117.182.53</br>子網路遮罩 : 255.255.254.0</br>預設匣道 : 140.117.183.254</br>" ;
		}
	?>
  </body>
</html>