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
	<!-- Include JavaScripts -->
	<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./scripts/main.js"></script>
    <style type="text/css">
	.msgtable 
	{    
	    border:1px solid black;
	    border-collapse: collapse;
	    width:340px; 
	    background-image:url('http://flow-er.lomo.jp/sozai/kabe/008/dot27.gif');
	}
		
	.msgtable tr, .msgtable td  
	{  
  	    border: 1px solid black;  
	}
	
	.left
	{
	    margin-left:50;
	    margin-right: auto;
	    margin-bottom: 20;
	}

	.right
	{
	    margin-left:autO;
	    margin-right:50;
	    margin-bottom: 20;
	}

    </style>
</head>

<body>
<canvas height="300px">
	<p>Your browser doesn't support HTML5. Try using Firefox or Chrome.</p>
</canvas>
<script type="text/javascript" src="./scripts/bg.js"></script>
    <div class="header" style="position:fixed; width:1000px; height:200px;">
			<a href="./01_1.php"><img src="./images/banner.png" alt="Dormnet119 home" name="banner" /></a>
		<!-- end .header -->
    </div>
    <div style="position:fixed; left:0%; height:100%; width:30%; float:left">
        <p align="center">留言板</p>
        <form method="post">
	<table align="center" style="text-align:center">
	    <tr>
                <td style="width:10px;">name</td>
                <td style=""><input type="text" width="150px" name="msg_name"/></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="msg_mail"/></td>
            </tr>        
            <tr>
                <td colspan="2">msg</td>
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
        $sql = "SELECT * FROM `GuestBook` ORDER BY `id` DESC";

        $sth = $dbh->query($sql);
        foreach( $sth as $tmp )
        {
	    $n=$n+1;
            if($n%2==0)
            	echo  "<div><table class='msgtable right' >";
            else
                echo  "<div><table class='msgtable left' >";


            echo  "<tr><td colspan='2' height=25px> " . htmlspecialchars( $tmp['timestamp'] ) . "</td></tr>";
            echo  "<tr><td height='25px' width='100px'>" . htmlspecialchars( $tmp['name'] ) . "</td>";
            echo  "<td height='25px' width='240px'>" .  htmlspecialchars( $tmp['mail'] ) . "</td></tr>";
            echo  "<tr><td colspan='2'>" . htmlspecialchars( $tmp['msg'] );
	    echo  "<form method='post'><textarea name='replyMsg'></textarea><input type='hidden' name='replyid' value='".$tmp['id']."'><input type='submit' value='Reply'></form>";
	    echo  htmlspecialchars( $tmp['replymsg'] );
	    echo  "</table></div>";
            
        }
    }

    function reply()
    {
	require("mysql.php");
        $sql = "SELECT `replymsg` FROM `GuestBook` WHERE `id` = '".$_POST['replyid']."'";
	$sth = $dbh->query($sql);
	$temp = $sth['replymsg'];

	$sql = "INSERT INTO `team2GuestDB`.`GuestBook` (`replyid`, `replymsg`) VALUES (:replyid, :replymsg);";
        $dbh->query($sql);
        $stm = $dbh->prepare($sql);
	$temp = $_POST['replyMsg']; 
        $stm->execute(array( ':replyid' => $_POST['replyid'], ':replymsg' => $temp));

    }

    isset($_POST['msg_name']) ? input() : false;
    if ( isset($_POST['replyMsg']) ) {
	reply();
    }

?>




<div style=" position:relative; left:30%; width:70%;">
<?php
    output();
?>
</div>
</body>
</html>

