<html>
<script type="text/javascript" src="../scripts/jquery-1.7.2.min.js"></script>
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
	<meta charset="utf-8"/>
	<title>Dorm-net 119</title>
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
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
                                <li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryIPInfomation&amp;lang=zh" title="查詢 IP 列表">查詢 IP 列表
</a></li>
                                <li><a href="http://wiki.cdpa.nsysu.edu.tw/Dorms_ip" title="封鎖列表" target="_blank">封鎖列表</a></li>
                                <li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryMACAddress&amp;lang=zh" title="維修進度">維修進度</a></li>
                        </ul>
                </li>

                <!-- Button 3 -->
                <li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="留言版">留言版</a></li>
                </ul>
                </div>

		<div class="content">	
		<div>
                	<h1 style="text-align: center; font-size: 36px; margin-left: -50px">維修進度查詢</h1>
                </div>

		<form method="POST">
			<font size=3>*請輸入至少一項查詢條件*</font><br/><br/>
			報修人姓名：<input type="text" name="uname" /><br />
			報修人信箱：<input type="text" name="umail" /><br />
			<input type="submit" value="開始查詢" />
		</form>
	
	<?php 
		function data()
		{
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
                        echo "<table align='center'>";
			echo "<br/><div style='background: #96CDCD; font-size: 11pt; width:550px;  padding:3px; margin: 0px auto;' align='center'>點擊可顯示詳細報修內容</div><br/>";
                        echo "<tr>";
                        echo "<td>報修時間</td><td>姓名</td><td>IP</td><td>卡號</td><td>處理狀態</td>";
                        echo "</tr>";
			
			for($i=0 ; $i<count($arr1); $i++)
			{
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
					}
		if(isset($_POST['uname']) || isset($_POST['umail']))	
			data();
	?>
			</div>
	
</body>
</html>
