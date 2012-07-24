<html>
<head>
	<title>Weiting's GuestBook</title>
	<meta charset="utf-8"/>
	<style>
		body{
			text-align:center;
		}
	</style>

</head>
	<body background="http://flow-er.lomo.jp/sozai/kabe/006/1.gif">
	<h1><font color="#926F4A">WEITING's GuestBoook</font><br/></h1>
		<form method="POST">

			Name:<br/> <input type="text" name="fname" /><br />
			Content:<br/><textarea rows="10" cols="20" name="fcontent">
			</textarea>
			<br/>
			<input type="submit" value="Send" />
		</form>
		<img src="http://flow-er.lomo.jp/sozai/line/002/line26.gif"/>
		<img src="http://flow-er.lomo.jp/sozai/line/002/line26.gif"/><br/>
		<?php
			function write()
			{

				$fptr = fopen("text.txt","a+");
				fprintf($fptr,"%s(%s)said:\n",$_POST['fname'],date("Y-m-d H:i:s",time()));
				fprintf($fptr,"%s\n",$_POST['fcontent']);
				fprintf($fptr,"-----------------------------------\n");
				fclose($fptr);
			}
			function read()
			{
				//$fptr = fopen("text.txt","w");
				//fclose($fptr);
				$fptr = fopen("text.txt","r+");
				while(!feof($fptr))
				{
					$buff = fgets($fptr);
					echo NL2BR($buff);
				}
				fclose($fptr);
				
			}
			if(isset($_POST['fname']))
			{
				write();
			}
			read();	
		?>
	</body>
</html>
