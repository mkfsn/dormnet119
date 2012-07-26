<html>
<meta charset="utf8" />
<title>無標題文件</title>
</head>

<body>
    <div style="position:fixed; left:0%; height:100%; width:30%; float:left" 
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
   
    function output()
        {
            require( "mysql.php" );
            $sql = "SELECT * FROM `GuestBook`";

            $sth = $dbh->query($sql);
            foreach( $sth as $tmp )
            {
                if($tmp['id']%2==0)
                    echo  "<div><table width='340' border='1' align='right' >";
                else
                    echo  "<div><table width='340' border='1' align='left' >";

                 echo  "<tr><td colspan='2' height=25px> " . htmlspecialchars( $tmp['timestamp'] ) . "</td></tr>";
                 echo  "<tr><td height='25px' width='100px'>" . htmlspecialchars( $tmp['name'] ) . "</td>";
                 echo  "<td height='25px' width='240px'>" .  htmlspecialchars( $tmp['mail'] ) . "</td></tr>";
                 echo  "<tr><td colspan='2'>" . htmlspecialchars( $tmp['msg'] ) . "</table></div>";
                 echo  "<br/><br/><br/><br/><br/>";
            }
        }

     isset($_POST['msg_name']) ? input() : false;

?>



<div style=" position:relative; left:30%; overflow:scroll; width:70%;">
<?php
    output();
?>
</div>
</body>
</html>

