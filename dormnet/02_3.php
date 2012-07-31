<!DOCTYPE html>
<html>
<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
         	$("tr:odd").live('click', function(){
			var rowIndex = $('tr').index(this);
			var i = rowIndex+1;
			if ( $("tr:eq("+i+")").css('display') == "none" )
				$("tr:eq("+i+")").fadeIn();
			else
				$("tr:eq("+i+")").fadeOut();
		
                });
		$("tr:even").hide();
		$("tr:eq(0)").show();
		$("tr.data").hover( function(){
			$(this).css('background', '#FFFFAA');
		}, function(){
			$(this).css('background', '#FFFFFF');
		});
        });
</script>		
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			.reply{
				text-align:left;
			}
			tr.data {
				cursor: pointer;
			}
		</style>
		<!-- TemplateBeginEditable name="doctitle" -->
		<title>Dorm-net 119</title>
		<!-- TemplateEndEditable -->
		<!-- TemplateBeginEditable name="head" -->
		<!-- TemplateEndEditable -->
		<link href="./css/main.css" rel="stylesheet" type="text/css" />
		<!-- Include JavaScripts -->
		<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="./scripts/main.js"></script>
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
						<li><a href="./02_1.php" title="查詢 IP 列表" >查詢 IP 列表</a></li>
						<li><a href="./02_2.php" title="封鎖列表" >封鎖列表</a></li>
						<li><a href="./02_3.php" title="維修進度" >維修進度</a></li>
					</ul>
				</li>

				<!-- Button 3 -->
				<li><a href="./03.php" title="留言版">留言版</a></li>
				</ul>
				</div>
				<!-- @end .navigation -->
				
				<!-- @start .content -->
				<div class="content" >	
					<div>
						<h1 style="text-align: center; font-size: 36px; margin-left: -50px">維修進度查詢</h1>
					</div>
					<!-- form start -->
					<form method="POST">
						<!-- Box1 start -->
					<?php
						function normal(){
					?>
						<div class = "box1">
							<h2>請輸入任一查詢資訊</h2>
							<div class = "name" >
								<p>報修人姓名：
									<input type="text" name="uname" /><br />
								</p>
							</div>
							<div class = "email" >
								<p>
									報修人信箱：
									<input type="text" name="umail" /><br />
								</p>
							</div>
						</div>
						<div id = "submitarea">
							<input type="submit" value="   送出 !   " name="start" />
							<input type="reset" value="    清除    " name="clear" />
						</div>
						<!-- Box1 end -->
						<?php
						}
							function data(){
								require("mysql.php");

								$sth = $dbh->prepare('SELECT * FROM  `test1` WHERE  `mail` LIKE  :mail OR  `name` =  :name');
								$sth->bindParam(':name',$_POST['uname']);
								$sth->bindParam(':mail',$_POST['umail']);
								$sth->execute();
									
								$arr1 = array();
								$arr2 = array();
								$nums = array();
								while($meta = $sth->fetch(PDO::FETCH_ASSOC))
								{
									/*
									echo "<tr>";
									echo "<td>".$meta["timestamp"]."</td>";
									echo "<td>".$meta["name"]."</td>";
									echo "<td>".$meta["ip"]."</td>";
									echo "<td>".$meta["mac"]."</td>";
									echo "<td>".$meta["status"]."</td>";
									echo "</tr>";
									*/
									$arr1[] = array($meta['id'], $meta['timestamp'], $meta['name'], $meta['ip'], $meta['mac'], $meta["status"] );
									$nums[] = $meta['id'];
								}
								$numstr = implode(",", $nums);
								$sql = "SELECT * FROM  `process_log` WHERE `id` IN ($numstr)";
								$sth = $dbh->query($sql);			
								$arr2 = $sth->fetchAll();	
						?>
								<div class = "box1">
								
						<?php
									echo "<table align='center'>";
									echo "<br/><div style='background: #96CDCD; font-size: 11pt; width:550px;  padding:3px; margin: 0px auto;' align='center'>點擊可顯示詳細報修內容</div><br/>";
									echo "<tr>";
									echo "<td>報修時間</td><td>姓名</td><td>IP</td><td>卡號</td><td>處理狀態</td>";
									echo "</tr>";
									
									for($i=0 ; $i<count($arr1); $i++){
										echo "<tr class='data'>";
										echo "<td>".$arr1[$i][1]."</td>";
										echo "<td>".$arr1[$i][2]."</td>";
										echo "<td>".$arr1[$i][3]."</td>";
										echo "<td>".$arr1[$i][4]."</td>";
										echo "<td>".$arr1[$i][5]."</td>";
										echo "</tr>";
										
										echo "<tr><td class='reply' colspan='5' align='left'>";
										echo "處理時間：".$arr2[$i][1]."<br/>";
										echo "處理網管：".$arr2[$i][2]."<br/>";
										echo "回覆內容：<br/>".$arr2[$i][3];
										echo "</td></tr>";	
									}
									echo "</table>";
						?>
								</div>
						<?php
						}
						if(isset($_POST['uname']) || isset($_POST['umail'])){
							data();
						}
						else{
							normal() ;
						}
						?>
								
								
					</form>
			<!-- @end .content -->
				</div>
			</div>
			<!-- @start footer -->
			<div id="footer"><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a><br />
				<br />
				Copyright c 2012 NSYSU-CDPA. All Rights Reserved. <img src="" width="1" />
			<!-- @end footer -->
			</div>
			<!-- @end .container -->
		
	</body>
</html>