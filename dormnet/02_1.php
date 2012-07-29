<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- TemplateBeginEditable name="doctitle" -->
		<title>Dorm-net 119</title>
		<!-- TemplateEndEditable -->
		<!-- TemplateBeginEditable name="head" -->
		<!-- TemplateEndEditable -->
		<link href="./css/main.css" rel="stylesheet" type="text/css" />
		<!-- Include JavaScripts -->
		<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="./scripts/main.js"></script>
		<style>
		table{
			border:1px #000000 solid;
			border-collapse:collapse;
		} 
		td{
			border:1px solid;
			text-align:center;
			padding:5px;
		}
		</style>
	</head>

	<body>

	<!-- HTML5 Canvas -->
	<canvas height="300px">
		<p>Your browser doesn't support HTML5. Try using Firefox or Chrome. Or enable JavaScript on this site.</p>
	</canvas>
	<script type="text/javascript" src="./scripts/bg.js"></script>

	<div class="outerWrapper">
		<!-- @start .container -->
		<div class="container">
			<!-- @start .container -->
			<div class="header" style="width:1000px; height:200px;">
				<a href="./01_1.php"><img src="./images/banner.png" alt="Dormnet119 home" name="banner" /></a>
			<!-- end .header -->
			</div>

			<!-- @start .navbar -->
			<div id="navbar">
			<ul class="level1">
			<!-- Button 1 -->
			<li><a href="./01_1.php" title="宿網報修">宿網報修</a></li>

			<!-- Button 2 : Drop menu -->
			<li class="submenu">查詢...
				<ul class="level2">
					<li><a href="./02_1.php" title="查詢 IP 列表">查詢 IP 列表</a></li>
					<li><a href="./02_2.php" title="封鎖列表" target="_blank">封鎖列表</a></li>
					<li><a href="./02_3.php" title="維修進度">維修進度</a></li>
				</ul>
			</li>

			<!-- Button 3 -->
			<li><a href="./03.php" title="留言版">留言版</a></li>
			</ul>
			</div>
			<!-- @end .navigation -->
			
			<!-- @start .content -->
			<div class="content">

				<div>
					<h1 style="text-align: center; font-size: 36px; margin-left: -50px">查詢 IP 列表</h1>
				</div>
				<!-- MySQL connect start -->
				<?php
					require ( "mysql.php" ) ;
					$sql  = "SELECT * FROM `ip_search`" ;
					$sth = $dbh -> query($sql) ;
					$result = $sth -> fetchAll() ;
			
				?>
				<!-- MySQL connect end -->
				<form name = "ip_search" method = "post" onsubmit="return CheckInfo();" >
					<!-- Box -->
					<div class = "box1">
					
					<!--<img src = "./icon.png" align = "right" width = "164" height = "120" /> -->
						<h2>請選擇寢室資訊</h2>
						<div class = "dorm" >
							<p>宿舍棟別 : 
							<select name = "dorm" title = "棟別" >
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
						</div>
						<div class = "room">
							<p>寢室房號 :
								<input type = "text" name = "room" size = "3" title = "房號" />
							</p>
						</div>
						<div class = "bed">
							<p>寢室床號 :
								<input type = "text" name = "bed" size = "3" title = "床號" />
							</p>
						</div>
					</div>
					<?php
						if ( isset($_POST[ 'dorm' ])&& isset($_POST[ 'room' ]) && isset($_POST[ 'bed' ]) ){
							foreach ( $result as $tmp ){
								if ( $_POST[ 'dorm' ] == $tmp[ 'dorm' ] && $_POST[ 'room' ] == $tmp[ 'room' ] && $_POST[ 'bed' ] == $_POST[ 'bed' ]){								
								?>
									<div class = "box1" ><table align = "center" >
									<h2>查詢結果</h2>
									<?php
										echo '<table align = "center" border = 1 >' ;
										echo '<tr>' ;
										echo '<td>床位</td><td> IP 位址</td><td>子網路遮罩</td><td>預設匣道</td>';
										echo '</tr>' ;
										echo '<tr>';
										echo '<td>'.'&nbsp'.htmlspecialchars( $tmp[ 'room' ] ).'-'.htmlspecialchars( $tmp[ 'bed' ] ).'&nbsp'.'</td>' ;
										echo '<td>'.'&nbsp'.htmlspecialchars( $tmp[ 'IP' ] ).'&nbsp'.'</td>' ;
										echo '<td>'.'&nbsp'.htmlspecialchars( $tmp[ 'submask' ] ).'&nbsp'.'</td>' ;
										echo '<td>'.'&nbsp'.htmlspecialchars( $tmp[ 'gateway' ] ).'&nbsp'.'</td></tr>' ;
										echo '</table>' ;
									?>
									</div>
							<?php
								}
							}
						}
							?>
					<div id = "submitarea">
						<input type="submit" value="   送出 !   " name="start" />
						<input type="reset" value="    清除    " name="clear" />
					</div>
				</form>
			</div>
		
			<!-- @end .content -->
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

	