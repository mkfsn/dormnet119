<?php
 function read()
 {
   $fptr=fopen("chatroom.txt","r+");
   while($mess=fgets($fptr))
     echo nl2br(htmlspecialchars($mess));
   fclose($fptr);
 }
 function write()
 {
   $fptr=fopen("chatroom.txt","a+");
   fwrite($fptr,$_POST['name'].date("[Y-m-d H-m-s]",time()).$_POST['con']."\n");
   fclose($fptr);
 }
 ?>
<html>
<head>
<title>Chat Room</title>
<meta http-equiv="Content-Language" content="utf-8">
</head>
<body background="http://flow-er.lomo.jp/sozai/kabe/006/hana7.gif">
 <h1 style="color:blue;" align="center"> Welcome to neiyu's chatroom :D</h1>
 <form action="chat.php"method="post">
 Name:<input type="text"name="name"/><br />
 Context:<br />
 <textarea row="200" cols="50" name="con">
 </textarea>
 <input type="submit"/><br />
  <?php
  if(isset($_POST['name']))
     write();
  read();   
  ?>
</body>
</html>

