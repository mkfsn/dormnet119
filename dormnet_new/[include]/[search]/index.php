<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Dorm-net 119</title>
	<!-- TemplateEndEditable -->
	<!-- TemplateBeginEditable name="head" -->
	<!-- TemplateEndEditable -->
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
	<!-- Include JavaScripts -->
	<script type="text/javascript" src="../scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../scripts/main.js"></script>

</head>

<body>

<canvas height="300px">
	<p>Your browser doesn't support HTML5. Try using Firefox or Chrome.</p>
</canvas>
<script type="text/javascript" src="../scripts/bg.js"></script>


<div class="outerWrapper">
	<!-- @start .container -->
	<div class="container">
		<!-- @start .container -->
		<div class="header" style="width:1000px; height:200px;">
			<a href="#"><img src="../images/banner.png" alt="Dormnet119 home" name="banner" /></a>
		<!-- end .header -->
		</div>

		<!-- @start .navbar -->
		<div id="navbar">
		<ul class="level1">
		<!-- Button 1 -->
		<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="宿網報修">宿網報修</a></li>

		<!-- Button 2 : Drop menu -->
		<li class="submenu">查詢...
			<ul class="level2">
				<li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryIPInfomation&amp;lang=zh" title="查詢 IP 列表">查詢 IP 列表</a></li>
				<li><a href="http://wiki.cdpa.nsysu.edu.tw/Dorms_ip" title="封鎖列表" target="_blank">封鎖列表</a></li>
				<li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryMACAddress&amp;lang=zh" title="維修進度">維修進度</a></li>
			</ul>
		</li>

		<!-- Button 3 -->
		<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="留言版">留言版</a></li>
		</ul>
		</div>
		<!-- @end .navigation -->
		<!-- @start .content -->
		<div class="content">

			<div>
				<h1 style="text-align: center; font-size: 36px; margin-left: -50px">查詢 IP 列表</h1>
			</div>
			<h3>請選擇寢室資訊</h3>
		<?php
		require ( "mysql.php" ) ;
		$sql  = "SELECT * FROM `ip_search`" ;
		$sth = $dbh -> query($sql) ;
		$result = $sth -> fetchAll() ;
		
		?>
	<form method = "post" >
	 <p>宿舍棟別 : 
	 <select name = "dorm">
	  <option selected = "selected" placeholder >-- 請選擇 --</option>
	  <option value="wuling_1">武嶺一村</option>
	  <option value="wuling_2">武嶺二村</option>
	  <option value="wuling_3">武嶺三村</option>
	  <option value="wuling_4">武嶺四村</option>
	  <option value="jhweihan_a">翠亨A棟</option>
	  <option value="jhweihan_b">翠亨B棟</option>
	  <option value="jhweihan_c">翠亨C棟</option>
	  <option value="jhweihan_d">翠亨D棟</option>
	  <option value="jhweihan_e">翠亨E棟</option>
	  <option value="jhweihan_f">翠亨F棟</option>
	  <option value="jhweihan_g">翠亨G棟</option>
	  <option value="jhweihan_h">翠亨H棟</option>
	  <option value="jhweihan_l">翠亨L棟</option>
	 </select>
	 <p>寢室房號 :
	  <input type = "text" name = "room" size = "3" />
	 </p>
	 <p>寢室床號 :
	  <input type = "text" name = "bed" size = "3" />
	 </p>
	 <input type="submit" value="開始查詢" id="start" />
	</form>
	<?php
		if ( isset($_POST[ 'dorm' ])&& isset($_POST[ 'room' ]) && isset($_POST[ 'bed' ]) ){
			foreach ( $result as $tmp ){
				if ( $_POST[ 'dorm' ] == $tmp[ 'dorm' ] && $_POST[ 'room' ] == $tmp[ 'room' ] && $_POST[ 'bed' ] == $_POST[ 'bed' ]){
					echo '床位 : '.htmlspecialchars( $tmp[ 'room' ] ).'-'.htmlspecialchars( $tmp[ 'bed' ] ).'</br>' ;
					echo 'IP 位址 : '.htmlspecialchars( $tmp[ 'IP' ] ).'</br>' ;
					echo '子網路遮罩 : '.htmlspecialchars( $tmp[ 'submask' ] ).'</br>' ;
					echo '預設匣道 : '.htmlspecialchars( $tmp[ 'gateway' ] ).'</br>' ;
				}
				
			}
		}
	?>
			


		<!-- @end .content -->
		</div>

		<!-- @start footer -->
		<div id="footer"><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a><br />
			<br />
			Copyright c 2012 NSYSU-CDPA. All Rights Reserved. <img src="" width="1" />
		<!-- @end footer -->
		</div>

	<!-- @end .container -->
	</div>
</div>


</body>
</html>

	