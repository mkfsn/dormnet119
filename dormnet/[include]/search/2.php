
<?php	// [Info.] The following code will be included in main page : div class "content"
?>

<?php // [Info.] Prepare variables used in (X)HTML
	
	// Root path (Directory)
	$root = get_rootPath('dormnet');
?>


<style type="text/css">
table {
	border: 1px #000000 solid;
	border-collapse: collapse;
}

td {
	border: 1px solid;
	text-align: center;
	padding: 2px;
}

</style>


<div>
	<h1 style="text-align: center; font-size: 36px; margin-left: -50px">網孔封鎖列表</h1>
</div>
<div class = "ip_search" >
<form method="post" id="search">
	<p align="right" >搜尋IP:
		<input type="text" name="ip"/>
		<input type="submit" value="Send"/>
	</p>
</form>
</div>

<div class = "box1">
	
	<div class = "list">
		
		<table align = "center">
		 <tr >  
			<td>IP 位址</td>
			<td>網路卡號</td>
			<td>網孔位址</td>
			<td>封鎖原因</td>
			<td>封鎖時間</td>
		  </tr> 
		</br>
		<?php
			require "$root" . '/[include]/[php]/mysql.php';
			$sql ="SELECT * FROM `banlist` ";
			$sth = $dbh->query($sql);
			$result = $sth->fetchAll();
			
		
			if(isset($_POST['ip'] ) )
			{
		?>
				<h2>查詢結果</h2>
		<?php
				foreach($result as $tmp){
					  if($_POST['ip'] == $tmp['ip'])
					{ 
							echo '<tr>';
							echo '<td>'.htmlspecialchars($tmp['ip']).'</td>';
							echo  '<td>'. htmlspecialchars($tmp['addr']).'</td>';
							echo  '<td>'. htmlspecialchars($tmp['plug']).'</td>';
							echo  '<td>'. htmlspecialchars($tmp['result']).'</td>';
							echo  '<td>'. htmlspecialchars($tmp['bantime']).'</td>';
							echo '<br/>';
					}
				}
			}

			else{
				foreach($result as $tmp){  
					echo '<tr>';
					echo '<td>'.htmlspecialchars( $tmp['ip']).'</td>';
					echo '<td>'. htmlspecialchars($tmp['addr']).'</td>';
					echo '<td>'. htmlspecialchars($tmp['plug']).'</td>';
					echo '<td>'. htmlspecialchars($tmp['result']).'</td>';
					echo '<td>'. htmlspecialchars($tmp['bantime']).'</td>';
				}	
			}

		?>
		
		</table>
		
	</div>	
</div>
<div class = "box1" >
	<div>
		<h3 align = "center">請依照您的封鎖原因參照下列方式解除問題後再申請報修！</h3>
	</div>
	</br>
	<div class = "text">
		<div class = "overflow">
			 
				<p>超量：
					<p>
					   &nbsp;&nbsp;&nbsp;
						說明：單日累計上傳流量大於 6GB 時，即行封鎖。</br>
					   &nbsp;&nbsp;&nbsp;
						7天後系統自動解除，不需申請解除封鎖。
					</p>
				</p>
		 </div>
		<hr>
		 <div class = "purposely_overflow">
			<p>蓄意超量：
				<p>
					<p>
					   &nbsp;&nbsp;&nbsp;
						說明：以任何方式逃避系統檢查的用戶，例如：更改 IP 、持續換網路孔等。</br>
					   &nbsp;&nbsp;&nbsp;
						30天後系統自動解除，不需申請解除封鎖。
					</p>
				</p>
			</p>
		 </div>
		<hr>
		 <div class = "error_ip">
			<p>IP設定錯誤(棟別-房號1 錯用 棟別-房號2 IP ) :
				<p>&nbsp;&nbsp;&nbsp;
					說明：當系統偵測到使用者未依規定設定各寢室分配的 IP 時，自動封鎖。</br>
				   &nbsp;&nbsp;&nbsp;&nbsp;
					請參考 <a href="./02_1.php" target="_blank" title="查詢IP列表">查詢 IP 列表</a> 設定正確的 IP (請務必填寫正確)。</br>
				</p>
				<p>&nbsp;&nbsp;&nbsp;
					請注意：若下列情況成立時，代表系統判斷錯誤，請以報修單告知我們，造成不便請見諒。</br>
				   &nbsp;&nbsp;&nbsp;&nbsp;
					房號1<span style="color: red;">不是</span>自己的房間</br>
				   &nbsp;&nbsp;&nbsp;&nbsp;
					房號2<span style="color: red;">是</span>自己的房間</br>
				</p>
			</p>
		 </div>
		<hr>
		 <div class = "ip_robbed">
			<p>搶IP(被搶的IP) :
				<p>
				   &nbsp;&nbsp;&nbsp;
					說明：當收到使用者的檢舉信並查證屬實後，即行封鎖。</br>
				   &nbsp;&nbsp;&nbsp;&nbsp;
					在本網站填寫報修單申請解除封鎖。
				</p>
			</p>
		 </div>
		<hr>
		 <div class = "letter">
			<p>教育部來函:封鎖原因 ( 檢舉信日期 ) :
				<p>&nbsp;&nbsp;&nbsp;
					說明：當收到國內外各單位轉寄給教育部的檢舉信時，即行封鎖。
				</p>
				<p>&nbsp;&nbsp;&nbsp;
					若原因為SPAM、OPEN PROXY：</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
							Step 1：重灌或調整系統至停止發送(可參考大量掃描或中毒的步驟)。</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
							Step 2：請至計中應用組解釋原因。</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
							Step 3：直接由計中解除封鎖，不需再次申請。
				</p>
				<p>&nbsp;&nbsp;&nbsp;若為侵權：</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
							Step 1：請至計中應用組解釋原因。</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
							Step 2：直接由計中解除封鎖，不需再次申請。
				</p>
			</p>
		 </div>
		<hr>
		 <div class = "scanning" >
			<p>大量掃描或中毒:
				<p>&nbsp;&nbsp;&nbsp;
					說明：十分鐘內對超過300臺不同主機發送ICMP ECHO封包，行為疑似中毒，但也有可能是P2P軟體所造成。</p>
				<p>&nbsp;&nbsp;&nbsp;
					若為中毒：</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
						Step 1：更新病毒碼、移除病毒或是直接重灌系統。</br>
					   &nbsp;&nbsp;&nbsp;&nbsp;
						Step 2：在本網站填寫報修單申請解除封鎖，說明已清除病毒。</br>
					   &nbsp;&nbsp;&nbsp;&nbsp;
						請注意：掃毒完畢沒有中毒並不代表一定沒有中毒，如果解除封鎖後又再被封鎖，請重灌系統。</br>
					   &nbsp;&nbsp;&nbsp;&nbsp;
						請注意：掃毒完畢後並不代表系統一定安全，若解除封鎖後又再度被封鎖，請重灌系統。
					
				</p>
				<p>&nbsp;&nbsp;&nbsp;
					若為P2P軟體所造成：</br>
						&nbsp;&nbsp;&nbsp;&nbsp;
						Step 1：請移除該軟體。</br>
					   &nbsp;&nbsp;&nbsp;&nbsp;
						Step 2：在本網站填寫報修單申請解除封鎖，說明已移除軟體。
				</p>
			</p>
		 </div>
		<hr>
		 <div class = "spam">
			<p>大量傳送信件(SPAM) :
				<p>
					&nbsp;&nbsp;&nbsp;
						說明：十分鐘內與超過30個不同的郵件主機連線，行為疑似中木馬被利用發送廣告信。</br>
					&nbsp;&nbsp;&nbsp;&nbsp;
						Step 1：更新病毒碼、移除病毒或木馬、或是直接重灌系統。</br>
					&nbsp;&nbsp;&nbsp;&nbsp;
						Step 2：在本網站填寫報修單申請解除封鎖，說明已清除病毒或木馬。
				</p>
				<p>
					&nbsp;&nbsp;&nbsp;
						請注意：掃毒完畢後並不代表系統一定安全，若解除封鎖後又再度被封鎖，請重灌系統。
				</p>
			</p>
		 </div>
		<hr>
		 <div class = "error_card" >
		<p>網路卡卡號錯誤:</br>
			<p>&nbsp;&nbsp;&nbsp;
				說明：您所使用的網路卡驅動程式有問題，或是網卡本身有問題，送出的卡號是錯誤的，會造成您自己與其他相同卡號的人網路不穩定。</br>
			   &nbsp;&nbsp;&nbsp;&nbsp;
				Step 1：更新驅動程式，或是更換網卡。</br>
			   &nbsp;&nbsp;&nbsp;&nbsp;
				Step 2：在本網站填寫報修單申請解除封鎖。
			</p>
		</p>
		 </div>

	 </div>
	</br>
	</br>
	<h3 align = "center">被封鎖的網路孔會在經過申請或是封鎖期滿後，於三個工作天內開啟！</h3>
</div>


