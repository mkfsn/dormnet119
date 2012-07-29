<!DOCTYPE html>

<?php
	// Get host
	$host = $_SERVER['HTTP_HOST'];
	
	//$host = "http://localhost/dormnet"; // @@@
	
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Dorm-net 119</title>
	<!-- Include CSS -->
	<link href="<?php echo "$host"; ?>/[include]/css/main.css" rel="stylesheet" type="text/css" />
	<!-- Include JavaScripts -->
	<script type="text/javascript" src="<?php echo "$host"; ?>/[include]/scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo "$host"; ?>/[include]/scripts/main.js"></script>
</head>

<body>
	<!-- HTML5 canvas : Background -->
	<canvas height="300px">
		<p>Your browser doesn't support HTML5. Try using Firefox or Chrome. Or enable JavaScript on this site.</p>
	</canvas>
	<script type="text/javascript" src="<?php echo "$host"; ?>/[include]/scripts/bg.js"></script>

	<!-- Outer wrapper -->
	<div class="outerWrapper">
		<!-- @start .container -->
		<div class="container">
			<!-- @start header -->
			<div class="header" style="width:1000px; height:200px;">
				<a href="#"><img src="<?php echo "$host"; ?>/[include]/images/banner.png" alt="Dormnet119 home" name="banner" /></a>
			</div>

			<!-- @start .navbar -->
			<div id="navbar">
				<ul class="level1">
				<!-- Button 1 -->
				<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="宿網報修">宿網報修</a></li>

				<!-- Button 2 : Drop menu -->
				<li class="submenu">查詢...
					<ul class="level2">
						<li><a href="http://140.117.202.136/dormnet119/dormnet/search/02_1.php" title="查詢 IP 列表">查詢 IP 列表</a></li>
						<li><a href="http://140.117.202.136/dormnet119/dormnet/search/02_2.php" title="封鎖列表" target="_blank">封鎖列表</a></li>
						<li><a href="http://140.117.202.136/dormnet119/dormnet/search/02_3.php" title="維修進度">維修進度</a></li>
					</ul>
				</li>

				<!-- Button 3 -->
				<li><a href="http://140.117.202.136/dormnet119/dormnet/message/03_3.php" title="留言版">留言版</a></li>
				</ul>
			</div>

			<?php 
			
				$script = $_SERVER['SCRIPT_NAME'];
				
				echo "$host";
				echo "<br>";
				echo "$script";
			
			?>

			<!-- @start footer -->
			<div id="footer"><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a><br />
				<br />
				Copyright c 2012 NSYSU-CDPA. All Rights Reserved. <img src="" width="1" />
			</div>

		</div>
	</div>

</body>
