<!DOCTYPE html>

<?php // [Info.] Function prototypes

	//--------------------------------------------------
	// \brief	Get slash type (Slash or backslash)
	// \return		Either slash or backslash
	//__________________________________________________
	if ( !function_exists('get_typSlash'))
	{
		function get_typSlash()
		{
			$pos = strpos(realpath('.'), '/');
			
			if (false === $pos)
			{
				return '\\';
			}
			else
			{
				return '/';
			}
		}
	}
	
	//--------------------------------------------------
	// \brief	Get root path
	// \param	$nameRoot		|	Name of root directory
	// \return		Root path
	//__________________________________________________
	if( !function_exists('get_rootPath'))
	{
		function get_rootPath($nameRoot)
		{
			$typSlash = get_typSlash();
			$str = realpath('.');
			$arr = explode("$typSlash", $str);
			$ct = count($arr);
			$i = array_search("$nameRoot", $arr);

			if (false !== $i)
			{
				$arr = array_slice($arr, 0, $i);
				$str = implode("$typSlash", $arr);
			}
			else // No corresponding root name found
			{
				return 'ERROR! Request wrong root name or directory does NOT exist (Path)';
			}
			
			return "$str" . "$typSlash" . $nameRoot;
		}
	}

	//--------------------------------------------------
	// \brief	Get root URL
	// \param	$nameRoot		|	Name of root URL
	// \return		Root URL
	//__________________________________________________
	if( !function_exists('get_rootURL'))
	{
		function get_rootURL($nameRoot)
		{
			$str = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
			$arr = explode('/', $str);
			$ct = count($arr);
			$i = array_search("$nameRoot", $arr);
			
			if (false !== $i)
			{
				$arr = array_slice($arr, 0, $i);
				$str = implode('/', $arr);
			}
			else // No corresponding root name found
			{
				return 'ERROR! Request wrong root name or directory does NOT exist (URL)';
			}
			
			return "$str" . '/' . $nameRoot;
		}
	}
	
?>

<?php // [Info.] Prepare variables used in (X)HTML

	// Get type of slash
	$typSlash = get_typSlash();
	// Protocol name, usually "http://"
	$protocol = (80 == $_SERVER["SERVER_PORT"] ? 'http://' : 'https://');
	// Name of the root (Directory)
	$nameRoot = 'dormnet';
	// Script (ex. "search?q=123") WITHOUT trailing slash
	$script = $_SERVER['SCRIPT_NAME'];
	
	// Root path (Directory)
	$root = get_rootPath("$nameRoot");
	// Host (ex. "www.google.com") WITHOUT trailing slash
	$host = "$protocol" . get_rootURL("$nameRoot");
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
					<li><a href="<?php echo "$host"; ?>/rescue/1.php" title="宿網報修">宿網報修</a></li>

					<!-- Button 2 : Drop menu -->
					<li class="submenu">查詢...
						<ul class="level2">
							<li><a href="<?php echo "$host"; ?>/search/1.php" title="查詢 IP 列表">查詢 IP 列表</a></li>
							<li><a href="<?php echo "$host"; ?>/search/2.php" title="封鎖列表">封鎖列表</a></li>
							<li><a href="<?php echo "$host"; ?>/search/3.php" title="維修進度">維修進度</a></li>
						</ul>
					</li>

					<!-- Button 3 -->
					<li><a href="<?php echo "$host"; ?>/board/1.php" title="留言版">留言版</a></li>
					</ul>
				</div>
				
				<!-- @start .content -->
				<div class="content">
				<?php // [Info.] Require contents in other files
					
					/*	Insert "[include]" into current script path
						ex. '/dormnet/rescue/1.php' ->
							'/dormnet/[include]/rescue/1.php'
						
						So you must put files which have exactly same name as front pages
					*/
					$arr = explode('/', "$script");
					$ct = count($arr);
					$i = array_search("$nameRoot", $arr);
					
					$arr = array_slice($arr, $i, $ct - $i);
					
					$i = array_search("$nameRoot", $arr);
					array_splice($arr, $i + 1, 0, array('[include]')); // Insert "[include]"
					$str = implode('/', $arr);

					require_once dirname("$root") . '/' . $str;
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

