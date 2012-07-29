<!DOCTYPE html>

<?php
	// [Info.] Prepare URL host (Relative) & file path (Absolute)

	$host = '/dormnet';
	$path = dirname(__FILE__); // Path of home directory
?>

<?php
	// [Info.] Prepare path & url
	
	$path_php_main = '/[include]/[php]/main.php';
	$path_css_main = '/[include]/css/main.css';
	$path_js_jquery = '/[include]/scripts/jquery-1.7.2.min.js';
	$path_js_main = '/[include]/scripts/main.js';
	$path_js_bg = '/[include]/scripts/bg.js';
	$path_img_banner = '/[include]/images/banner.png';
	
	$path_cont_index = '/[include]/index.php';
	$path_cont_message = '/[include]/[message]/index.php';
	$path_cont_repair = '/[include]/[repair]/index.php';
	$path_cont_search = '/[include]/[search]/index.php';
	
	$url_index = '';
	$url_message = '/message/';
	$url_repair = '/repair/';
	$url_search = '/search/';
?>

<?php
	// [Info.] Include PHP function file
	//include "$host" . '$path_php_main';
?>

<?php
	// [Info.] Prepare script name (For detecting internal php require command)
	
	// Get script name (ex. message/index.php)
	$script = $_SERVER['SCRIPT_NAME'];
	$arr_script = explode('/', $script);
	$arr_script = array_reverse($arr_script);
?>


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Dorm-net 119</title>
	<!-- Include CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo "$host" . "$path_css_main"; ?>" />
	<!-- Include JavaScripts -->
	<script type="text/javascript" src="<?php echo "$host" . "$path_js_jquery"; ?>"></script>
	<script type="text/javascript" src="<?php echo "$host" . "$path_js_main"; ?>"></script>
</head>

<body>
	<!-- HTML5 canvas : Background -->
	<canvas height="300px">
		<p>Your browser doesn't support HTML5. Try using Firefox or Chrome. Or enable JavaScript on this site.</p>
	</canvas>
	<script type="text/javascript" src="<?php echo "$host" . "$path_js_bg"; ?>"></script>

	<!-- Outer wrapper -->
	<div class="outerWrapper">
		<!-- @start .container -->
		<div class="container">
			<!-- @start header -->
			<div class="header" style="width:1000px; height:200px;">
				<a href="<?php echo "$host" . "$url_index"; ?>"><img src="<?php echo "$host" . "$path_img_banner"; ?>" alt="Dormnet119 home" name="banner" /></a>
			</div>

			<!-- @start .navbar -->
			<div id="navbar">
				<ul class="level1">
				<!-- Button 1 -->
				<li><a href="<?php echo "$host" . "$url_repair"; ?>" title="宿網報修">宿網報修</a></li>

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
				// [Info.] Prepare html contents
				$cont;
				
				switch ($arr_script[1])
				{
					case 'dormnet': //----- Dormnet -----
						$cont = file_get_contents("$path" . "$path_cont_index");
					
					break;
					case 'message': //----- Message -----
						$cont = file_get_contents("$path" . "$path_cont_message");
					
					break;
					case 'repair': //----- Repair -----
						$cont = file_get_contents("$path" . "$path_cont_repair");
					
					break;
					case 'search': //----- Search -----
						$cont = file_get_contents("$path" . "$path_cont_search");
					
					break;
					default:
						$cont = 'Error : Could NOT resolve URL. (At include.php)';
				}
				
				// Echo contents
				echo "$cont";
			?>

			<!-- @start footer -->
			<div id="footer"><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a><br />
				<br />
				Copyright c 2012 NSYSU-CDPA. All Rights Reserved. <img src="" width="1" />
			</div>

		</div>
	</div>

</body>
