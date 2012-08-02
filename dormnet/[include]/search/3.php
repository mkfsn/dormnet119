
<?php	// [Info.] The following code will be included in main page : div class "content"
?>

<?php // [Info.] Prepare variables used in (X)HTML
	
	// Root path (Directory)
	$root = get_rootPath('dormnet');
?>


<style>
table {
	border: 1px #000000 solid;
	border-collapse: collapse;
} 

td {
	border: 1px solid;
	text-align: center;
	padding: 5px;
}

.reply {
	text-align: left;
}

tr.data {
	cursor: pointer;
}
</style>

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


<div>
	<h1 style="text-align: center; font-size: 36px; margin-left: -50px">維修進度查詢</h1>
</div>

<!-- @start form -->
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
			require "$root" . '/[include]/[php]/mysql.php';

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

