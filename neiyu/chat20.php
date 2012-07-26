<?php
 function read()
 {
	 require("mysql.php");
         $sql="SELECT * FROM `GuestBook`";
         $sth=$dbh->query($sql);
         $result=$sth->fetchAll();
   	 foreach($result as $tmp){
   	 echo htmlspecialchars($tmp['name'].$tmp['timestamp']." : ".$tmp['msg']).'<br/>';}

/*   $fptr=fopen("chatroom.txt","r+");
   while($mess=fgets($fptr))
     echo nl2br(htmlspecialchars($mess));
   fclose($fptr);*/
 }
 function write()
 {
/*   $fptr=fopen("chatroom.txt","a+");
   fwrite($fptr,$_POST['name'].date("[Y-m-d H-m-s]",time()).$_POST['con']."\n");
   fclose($fptr);*/
	require("mysql.php");
	$sql = "INSERT INTO `team2GuestDB`.`GuestBook` (`id`, `name`, `msg`, `timestamp`) VALUES (NULL, :name, :msg, CURRENT_TIMESTAMP)";
	$stm = $dbh->prepare($sql);
	$stm->execute(array(':name' => $_POST['name'],':msg' => $_POST['con']));
 }	
?>
<html>
<head>
<title>Chat Room</title>
<meta charset="utf-8">
<style>
	 body{text-align:center;}
         textarea{background:url(http://flow-er.lomo.jp/sozai/irasuto/mohu/icon9_a.gif) no-repeat right bottom;}

</style>
</head>
<body background="http://flow-er.lomo.jp/sozai/kabe/006/hana7.gif">
	<h1 style="color:blue;" align="center"> Welcome to neiyu's chatroom :D</h1>
      
	<form action="chat20.php"method="post">
	 Name:<br /><input type="text"name="name"/><br />
	 Context:<br />
	<textarea rows="10" cols="20" name="con" >
	</textarea>
	<input type="submit"/><br />
	</form>
        <?php
	isset($_POST['name'])? write():false;
	read();   
	?>
</body>
</html>

