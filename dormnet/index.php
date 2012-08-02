<!DOCTYPE html>

<?php // [Info.] Function prototypes
	
	//--------------------------------------------------
	// \brief	Get root path
	// \param	$nameRoot		|	Name of root directory
	// \return		Root path
	//__________________________________________________
	if(!function_exists('get_rootPath'))
	{
		function get_rootPath($nameRoot)
		{
			$str = realpath('.');
			$arr = explode('\\', $str);
			$ct = count($arr);
			$i;
			
			for ($i = 0; $i < $ct; ++$i)
			{
				if ($arr[$i] == $nameRoot)
					break;
			}
			
			if ($i < $ct)
			{
				$arr = array_slice($arr, 0, $i);
				$str = implode('\\', $arr);
			}
			else // No corresponding root name found
			{
				return 'ERROR! Request wrong root name or directory does NOT exist';
			}
			
			return "$str" . '\\' . $nameRoot;
		}
	}

?>

<?php // [Info.] Prepare variables used in (X)HTML
	
	// Protocol name, usually "http://"
	$protocol = (80 == $_SERVER["SERVER_PORT"] ? 'http://' : 'https://');
	// Name of the root (Directory)
	$nameRoot = '/dormnet';
	
	// Root path (Directory)
	$root = get_rootPath('dormnet');
	// Host (ex. "http://www.google.com") WITHOUT trailing slash
	$host = "$protocol" . $_SERVER['SERVER_NAME'] . "$nameRoot";
	// Script (ex. "search?q=123") WITHOUT trailing slash
	$script = $_SERVER['SCRIPT_NAME'];
?>


<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Dorm-net 119</title>

		<!-- Include CSS -->
		<link href="<?php echo "$host"; ?>/[include]/[css]/main.css" rel="stylesheet" type="text/css" />
		
		<!-- Include JavaScripts -->
		<script type="text/javascript" src="<?php echo "$host"; ?>/[include]/[scripts]/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo "$host"; ?>/[include]/[scripts]/main.js"></script>
	</head>

	<body>
		
		<!-- @start .wrapper -->
		<div class="wrapper">
			<!-- @start .container -->
			<div class="container">
				<!-- @start .container -->
				<div class="header" style="width:1000px; height:200px;">
					<a href="<?php echo "$host"; ?>/"><img src="<?php echo "$host"; ?>/[include]/[images]/banner.png" alt="Dormnet119 home" name="banner" /></a>
				</div>

				<!-- @start .navbar -->
				<div id="navbar">
					<ul class="level1">
					<!-- Button 1 -->
					<li><a href="/dormnet/rescue/1.php" title="宿網報修">宿網報修</a></li>

					<!-- Button 2 : Drop menu -->
					<li class="submenu">查詢...
						<ul class="level2">
							<li><a href="/dormnet/search/1.php" title="查詢 IP 列表">查詢 IP 列表</a></li>
							<li><a href="/dormnet/search/2.php" title="封鎖列表">封鎖列表</a></li>
							<li><a href="/dormnet/search/3.php" title="維修進度">維修進度</a></li>
						</ul>
					</li>

					<!-- Button 3 -->
					<li><a href="/dormnet/board/1.php" title="留言版">留言版</a></li>
					</ul>
				</div>
				
				<!-- @start .content -->
				<div class="content">
				<?php // [Info.] Require contents in other files
					
					/*	Replace first subdomain name
						ex. '/dormnet/rescue/1.php' ->
							'/[include]/rescue/1.php'
						
						So you must put files which have exactly same name as front pages
					*/
					$arr = explode('/', "$script");
					$arr[1] = '[include]'; // _STRING_
					
					$str = implode('/', $arr);
					
					require_once $str;
				
				?>
				</div>

				
				<!-- @start footer -->
				<div id="footer"><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a><br />
					<br />
					Copyright © 2012 NSYSU-CDPA. All Rights Reserved. <img src="" width="1" />
				<!-- @end footer -->
				</div>
				
			</div>
		</div>

	</body>
</html>

