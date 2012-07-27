<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- TemplateBeginEditable name="doctitle" -->
	<title>Dorm-net 119</title>
	<!-- TemplateEndEditable -->
	<!-- TemplateBeginEditable name="head" -->
	<!-- TemplateEndEditable -->
	<link href="./css/main.css" rel="stylesheet" type="text/css" />
        <link href="./css/msg_css.css" rel="stylesheet" type="text/css" />
	<!-- Include JavaScripts -->
	<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./scripts/main.js"></script>

</head>

<body>

<canvas height="300px">
	<p>Your browser doesn't support HTML5. Try using Firefox or Chrome.</p>
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
		<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="宿網報修">宿網報修</a></li>

		<!-- Button 2 : Drop menu -->
		<li class="submenu">查詢...
			<ul class="level2">
				<li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryIPInfomation&amp;lang=zh" title="查詢 IP 列表">查詢 IP 列表</a></li>
				<li><a href="http://wiki.cdpa.nsysu.edu.tw/Dorms_ip" title="封鎖列表" target="_blank">封鎖列表</a></li>
				<li><a href="http://dormnet119.cdpa.tw/?action=Tuition&amp;type=QueryMACAddress&amp;lang=zh" title="維修進度">維修進度</a></li>
			</ul>
		</li>

		<!-- Button 3 -->
		<li><a href="http://dormnet119.cdpa.tw/?action=BugReport&amp;lang=zh" title="留言版">留言版</a></li>
		</ul>
		</div>
		<!-- @end .navigation -->
		<!-- @start .content -->
		<div class="content">
			<!-- @start 留言處 -->
			<div id="left_div"  >
        			<form method="post">
				<table class="msg_box" align="center" style="text-align:center">
					<tr>
				    	<td colspan="2"><h2>留言板</h2></td>
					</tr>
	    				<tr>
                			    <td style="width:10px;">name</td>
                			    <td><input type="text" width="150px" name="msg_name" value=" "/></td>
            				</tr>
            				<tr>
                			    <td>email</td>
                			    <td><input type="text" name="msg_mail"/></td>
            				</tr>        
      				        <tr>
                			    <td>msg</td>
					    <td></td>
            				</tr>
            				<tr>
                			    <td colspan="2"><textarea  style="width:220px; height:100px" name="msg_content"></textarea> </td>
            				</tr>
            				<tr>
       	        			    <td colspan="2">
                			    <input type="submit" value="Send" style="width:100px"/>
                			    <input type="reset" value="Reset" style="width:100px"/>
                			    </td>            
            				</tr>
        			</table>
        			</form>
    			</div>
<?php
    function input()
    {
        require("mysql.php");
        $sql = "INSERT INTO `team2GuestDB`.`GuestBook` (`id`, `name`, `mail`, `msg`,`timestamp`) VALUES (NULL, :name, :mail, :msg, CURRENT_TIMESTAMP);";
        $dbh->query($sql);
        $stm = $dbh->prepare($sql);
        $stm->execute(array( ':name' => $_POST['msg_name'], ':mail' => $_POST['msg_mail'], 'msg' => $_POST['msg_content']));
    }
   
    function output($n)
    {
        require( "mysql.php" );
        $sql = "SELECT * FROM `GuestBook` ORDER BY `timestamp` DESC";

        $sth = $dbh->query($sql); $sth2 = $dbh->query($sql);
        foreach( $sth as $tmp )
        {
	    if($tmp['replyid']==0)
	    {
	    	$n=$n+1;
            	if($n%2==0)
            	    echo  "<div><table class='msgtable right' >";
            	else
                    echo  "<div><table class='msgtable left' >";


            	echo  "<tr><td colspan='2'>Time: " . htmlspecialchars( $tmp['timestamp'] ) . "</td></tr>";
            	echo  "<tr><td width='10px'>Name: " . htmlspecialchars( $tmp['name'] ) . "</td>";
            	echo  "<td width='50px'>Mail: " .  htmlspecialchars( $tmp['mail'] ) . "</td></tr>";
            	echo  "<tr><td colspan='2'>Message:<br/>　　" . htmlspecialchars( $tmp['msg'] ). "</td></tr>";
	    	echo  "<tr><td colspan='2'>Reply:</td></tr>";
	        /*$sql2 = "SELECT `msg` FROM `GuestBook` WHERE `id`=".$tmp['replyid'];
		$stm->execute(array( 'id' => $tmp['replyid']));*/
		foreach( $sth2 as $tmp2 )
        	{
            	    if($tmp2['replyid']==$tmp['id'])
            	    {
			//echo  "<table class='msgtable left' >";
                	echo  "<tr><td colspan='2'>　　>" . htmlspecialchars( $tmp2['msg'] ) . "</td></tr>";
                	
            	    }
		
            	}
		$sth2 = $dbh->query($sql);
		echo "</table>";
	        echo  "<table align='center'><tr><td><form method='post'><textarea name='replyMsg'></textarea><input type='hidden' name='replyid' value='".$tmp['id']."'><input type='submit' value='Reply'></form></td></tr>";	
		echo  "</table></div>";

	    }
	    
        }
    }

    function reply()
    {
	require("mysql.php");
	$sql = "INSERT INTO `team2GuestDB`.`GuestBook` (`msg`, `replyid`) VALUES (:msg, :replyid);";
	$dbh->query($sql);
        $stm = $dbh->prepare($sql);
	
        $stm->execute(array( ':msg' => $_POST['replyMsg'], ':replyid' => $_POST['replyid']));
    }

    if( $_POST['msg_name']!=" " )
	input();
    if ( isset($_POST['replyMsg']) ) {
	reply();
    }

?>




<div style=" position:relative; left:30%; width:60%;">
<?php
    output();
?>
</div>

		<!-- @end .content -->
		</div>

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

	

