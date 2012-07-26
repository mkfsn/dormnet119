<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">

<html>
<meta charset="utf8">
<style type="text/css">
body{
	text-align: center;
}
</style>

<h1>WE LOVE LOLI</h1>
<div style =" background : pink;">
<h1>讚美LOLITA</h1>
</div>
<br/>
 <head><title>stay salt board</title></head>
 <body bgcolor=06aaff >
  <form method="post">
  <label class="mau">name:</label>
  <input type ="text" name="fname"/><br/><br/>
 
<img src="http://i.imgur.com/gmFL4.jpg">
  <label>said:</label>
  <textarea rows="10" cols="20" name="talk" >
  </textarea>
  
  <tfoot>
   <tr>
    <td>
     <input type="submit" value="Send"/>
    </td>
   </tr>
  </tfoot>
<img src="http://i.imgur.com/Dq4a0.gif"> 
  <br/> 
 </body>
</html>

<?php
if($_POST['talk'] != NULL || $_POST['frame'] != NULL)
{
$in_name = $_POST['fname'];
$in_context =$_POST['talk'];

require ("mysql.php");
 $sql = " INSERT INTO `GuestBook`(`id`, `name`, `msg`, `timestamp`) VALUES (NULL,:name,:msg,CURRENT_TIMESTAMP) ";
 $stm = $dbh->prepare($sql);
 $stm -> execute (array(':name' => $in_name ,':msg' => $in_context)); 
//  $q = fopen("remember.txt","a+");
//  $sa = $_POST['talk'];
//  $na = $_POST['fname'];
//  fprintf($q,"%s: %s\n",$na,$sa);
//  fclose($q);
}

//$q = fopen("remember.txt","r");
//while( $content = fgets($q) ) {
//	echo nl2br(htmlspecialchars($content));
require ("mysql.php");
$sql ="SELECT * FROM `GuestBook` ";
$sth = $dbh->query($sql);
$result = $sth->fetchAll();
foreach($result as $tmp){
 echo htmlspecialchars( $tmp['name']);
 echo " said:".'<br/>' ;    
 echo  htmlspecialchars($tmp['msg']);
 echo '<br/>'.'<br/>';
     

}
//}

//fclose($q);

?>
