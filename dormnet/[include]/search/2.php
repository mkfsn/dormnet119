
<?php	// [Info.] The following will be included in main page : div class "content"
?>

<?php // [Info.] Prepare variables used in (X)HTML
	
	// Root path (Directory)
	$root = get_rootPath('dormnet');
?>


<style type="text/css">
form#search {
	float: right;
}

table#tsukue {
	margin-left: auto;
	margin-right: auto;
}
	
.naka {
	margin-left: auto;
	margin-right: auto;
}

div#textcenter {
	text-align: center;
}

</style>


<form action="findbanhole.php" method="POST" id="search">
搜尋IP: <input type="text" name="ip"/>
 <input type="submit" value="Send"/>
</form>
<table border=1 id="tsukue">
 <tr bgcolor ="gray" >  
    <td>目標位址</br>Target IP </td>
    <td>目標網卡</br>Physical Addr. </td>
    <td>目標網孔</br>Plug</td>
    <td>封鎖原因</br>Banned Result </td>
    <td>封鎖時間</br>Disabled On </td>
  </tr> 
</br>
 


<?php  
require "$root" . '/[include]/search/mysql.php';
$sql ="SELECT * FROM `banlist` ";
$sth = $dbh->query($sql);
$result = $sth->fetchAll();

if($_POST['ip']!=NULL)
{
foreach($result as $tmp){
      if($_POST['ip'] == $tmp['ip'])
	{ 
        	echo '<tr>';
        	echo '<td>'.htmlspecialchars( $tmp['ip']).'</td>';
      	        echo  '<td>'. htmlspecialchars($tmp['addr']).'</td>';
        	echo  '<td>'. htmlspecialchars($tmp['plug']).'</td>';
        	echo  '<td>'. htmlspecialchars($tmp['result']).'</td>';
        	echo  '<td>'. htmlspecialchars($tmp['bantime']).'</td>';
//echo '<br/>';
	}
}


}

else{
	$counter= 0;
	
	foreach($result as $tmp)	
	{    
	    if($counter%2 == 0){	 
		echo '<tr>';
		}
	    else{
		?>		
		<tr bgcolor=#A4A4A4>
		<?php
		} 	
		echo '<td>'.htmlspecialchars( $tmp['ip']).'</td>';
		echo  '<td>'. htmlspecialchars($tmp['addr']).'</td>';
		echo  '<td>'. htmlspecialchars($tmp['plug']).'</td>';
		echo  '<td>'. htmlspecialchars($tmp['result']).'</td>';
		echo  '<td>'. htmlspecialchars($tmp['bantime']).'</td>';
	$counter++;	
	}	

}

?>


</table>
<div id='textcenter'>
<h3 class='naka'>請依照您的封鎖原因參照下列方式解除問題後再申請報修！</h3>
<a></a>
</div>

<ul class ='naka'> 
<li>超量
	<ul>
	<li>說明：單日累計流量大於6GB時，即行封鎖。</li>
	<li>七天後系統自動解除，不需申請解除封鎖。</li>
	</ul>
</li>
 
<li>蓄意超量
	<ul>
	<li>說明：以任何方式逃避系統檢查的用戶，例如：更改IP、持續換網路孔等。</li>
	<li>30天後系統自動解除，不需申請解除封鎖 (請參考)</li>
	</ul>
</li>
 
<li><a name="section_wrongip"></a>IP設定錯誤(棟別-房號1 錯用 棟別-房號2 IP)
	<ul>
	<li>說明：當系統偵測到使用者未依規定設定各寢室分配的IP時，自動封鎖。</li>
	<li>Step 1：請參考 <a href="http://dormnet119.cdpa.nsysu.edu.tw/?action=Tuition&type=QueryIPInfomation" target="_blank" title="查詢IP設定值">查詢IP設定值</a> 或 <a href="http://wiki.cdpa.nsysu.edu.tw/Dorms_ip" target="_blank" title="查詢IP分配表">查詢IP分配表</a> 設定正確的IP <span style="color: red;">(重設時請不要搶同寢室友IP)</span>。</li>
	<li>Step 2：在本網站填寫報修單申請解除封鎖，<span style="color: red;">不需</span>到西灣dorm-net-119版貼版。</li>
	<li>請注意：若下列情況成立時代表系統判斷錯誤，請以報修單告知我們，造成不便請見諒。<ul>
		<li>房號1<span style="color: red;">不是</span>自己的房間</li>
		<li>房號2<span style="color: red;">是</span>自己的房間</li>
	</ul></li>
	</ul>
</li>
 
<li><a name="section_iprob"></a>搶IP(被搶的IP)
	<ul>
	<li>說明：當收到使用者的檢舉信並查證屬實後，即行封鎖。</li>
	<li>Step 1：請在
		<a href="http://bbs3.nsysu.edu.tw/txtVersion/boards/dorm-net-119/" target="_blank" title="中山西灣BBS">中山西灣BBS 的 dorm-net-119版</a> 貼版保證不會再犯。
	</li>
	<li>Step 2：在本網站填寫報修單申請解除封鎖。</li>
	</ul>
</li>
 
<li><a name="section_edureport"></a>教育部來函:封鎖原因(檢舉信日期)
	<ul>
	<li>說明：當收到國內外各單位轉寄給教育部的檢舉信時，即行封鎖。</li>
	<li>若原因為SPAM、OPEN PROXY：
		<ul>
		<li>Step 1：重灌或調整系統至停止發送(可參考大量掃描或中毒的步驟)。</li>
		<li>Step 2：請至計中應用組解釋原因。</li>
		<li>Step 3：直接由計中解除封鎖，不需再次申請。</li>
		</ul>
	</li>
	<li>若為侵權：
		<ul>
		<li>Step 1：請至計中應用組解釋原因。</li>
		<li>Step 2：直接由計中解除封鎖，不需再次申請。</li>
		</ul>
	</li>
	</ul>
</li>
 
<li><a name="section_scan"></a>大量掃描或中毒
	<ul>
	<li>說明：十分鐘內對超過300臺不同主機發送ICMP ECHO封包，行為疑似中毒，但也有可能是P2P軟體所造成。</li>
	<li>若為中毒：
		<ul>
		<li>Step 1：更新病毒碼、移除病毒或是直接重灌系統。</li>
		<li>Step 2：安裝 <a href="http://www.cdpa.nsysu.edu.tw/2006/virusfix.php" target="_blank" title="安裝修正程式">http://www.cdpa.nsysu.edu.tw/2006/virusfix.php</a> 提供之修正程式。</li>
		<li>Step 3：在本網站填寫報修單申請解除封鎖，說明已清除病毒。</li>
		<li>請注意：掃毒完畢沒有中毒並不代表一定沒有中毒，如果解除封鎖後又再被封鎖，請重灌系統。</li>
		<li>請注意：掃毒完畢後並不代表系統一定安全，若解除封鎖後又再度被封鎖，請重灌系統。</li>
		</ul>
	</li>
	<li>若為P2P軟體所造成：
		<ul>
		<li>Step 1：請移除該軟體。</li>
		<li>Step 2：在本網站填寫報修單申請解除封鎖，說明已移除軟體。</li>
		</ul>
	</li>
	</ul>
</li>
 
<li>大量傳送信件(SPAM)
	<ul>
	<li>說明：十分鐘內與超過30個不同的郵件主機連線，行為疑似中木馬被利用發送廣告信。</li>
	<li>Step 1：更新病毒碼、移除病毒或木馬、或是直接重灌系統。</li>
	<li>Step 2：在本網站填寫報修單申請解除封鎖，說明已清除病毒或木馬。</li>
	<li>請注意：掃毒完畢後並不代表系統一定安全，若解除封鎖後又再度被封鎖，請重灌系統。</li>
	</ul>
</li>
 
<li>網路卡卡號錯誤
	<ul>
	<li>說明：您所使用的網路卡驅動程式有問題，或是網卡本身有問題，送出的卡號是錯誤的，會造成您自己與其他相同卡號的人網路不穩定。</li>
	<li>Step 1：更新驅動程式，或是更換網卡。</li>
	<li>Step 2：在本網站填寫報修單申請解除封鎖。</li>
	</ul>
</li>
 
</ul>
 
<h3>被封鎖的網路孔會在經過申請或是封鎖期滿後，於三個工作天內開啟！</h3>
<!-- End of List Mode -->
</html>

