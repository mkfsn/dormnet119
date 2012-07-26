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
?>



<div style=" position:relative; left:30%; overflow:scroll; width:70%;">
留言顯示
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p><p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
<p>1111</p>
</div>
</body>
</html>

