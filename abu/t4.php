<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <title>測試留言板</title>
		<style type="text/css">
			table {
				border: 0px;
				text-align: left;
			}
		</style>
</head>

<body>
	<h3 style="font-weight:bold; text-align:center;">廢屁版</h3>
        <form method='post'>
			<table align="center">
				<tr>
					<td border="15px">Name：</td>
					<td><input type='text' name='name' /></td>
				</tr>
				<tr>
					<td style="vertical-align:top;">Content：</td>
					<td><textarea rows="10" cols="30" name='content'></textarea></td>
				</tr>
				<tr >
					<td colspan="2" align="center"><input type='submit' value='SUBMIT' />  <input type='reset' value='RESET' /></td>
				</tr>	
			</table>
        </form>
		<p></p>
		

        <?php
                function output()
                {
                        $fo = fopen('bbs.txt','r+');
                        while( $co = fgets($fo) )
                        {
                                echo nl2br(htmlspecialchars($co));
                        }
                        fclose($fo);
                }

                function input()
                {
                        $fi = fopen('bbs.txt','a+');
                        fwrite($fi, $_POST['name'] . " 在 " . date( "Y 年 m 月d 日 -  H:i:s ", time()). " 說： " . $_POST['content'] . "\n");
                        fclose($fi);
                }

                if(isset($_POST['name']))
                        input();
                output();

        ?>

</body>

</html>



