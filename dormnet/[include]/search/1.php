
<?php	// [Info.] The following code will be included in main page : div class "content"
?>

<?php // [Info.] Prepare variables used in (X)HTML
	
	// Root path (Directory)
	$root = get_rootPath('dormnet');
?>


<style type="text/css">
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


<div>
	<h1 style="text-align: center; font-size: 36px; margin-left: -50px">查詢 IP 列表</h1>
</div>

<!-- MySQL connect start -->
<?php
	require "$root" . '/[include]/[php]/mysql.php';
	$sql  = "SELECT * FROM `ip_search`" ;
	$sth = $dbh -> query($sql) ;
	$result = $sth -> fetchAll() ;
?>

<!-- MySQL connect end -->
<form name='ip_search' method='POST' onsubmit='return CheckInfo();'>
					<!-- Box -->
					
					
					<!--<img src = "./icon.png" align = "right" width = "164" height = "120" /> -->
					<?php
						function normal(){
					?>
						<div class = "box1">
		<h2>請選擇寢室資訊</h2>
		<div class="dorm">
			<p>宿舍棟別 : 
			<select name="dorm" title="棟別">
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
				<input type="text" name="room" size="3" title="房號" />
			</p>
		</div>
		<div class = "bed">
			<p>寢室床號 :
				<input type="text" name="bed" size="3" title="床號" />
			</p>
		</div>
	</div>
					<div id = "submitarea">
						<input type="submit" value="   送出 !   " name="start" />
						<input type="reset" value="    清除    " name="clear" />
					</div>
					<?php
						}
		if ( isset($_POST[ 'dorm' ])&& isset($_POST[ 'room' ]) && isset($_POST[ 'bed' ]) ){
			foreach ( $result as $tmp ){
				if ( $_POST[ 'dorm' ] == $tmp[ 'dorm' ] && $_POST[ 'room' ] == $tmp[ 'room' ] && $_POST[ 'bed' ] == $_POST[ 'bed' ]){								
	?>
					<div class="box1"><table align="center">
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
						else{
							normal() ;
						}
							?>
					
				</form>
