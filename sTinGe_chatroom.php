<?php
   session_start();
?>
<html>
 <head><meta charset = "utf-8" ><title>Message Board</title></head>
  <body bgcolor = "brown" >
   <b><p align = "center" style = " color:yellow ; font-size:40px ;" >Test Message Board</p> 
   <?php
	function normal(){
   ?>
   <form action = 'message.php' method = 'post'><b>
		<div style="color:#00FF00">
		<p 
		style = ' font-size:20px ; font-family:'¼Ð·¢Åé';'><big>N</big> a m e:</p>
		<input type = 'text' name = 'fname' size = "20" /></br>
		
		<p style = " font-size:20px ;"><big>C</big> o n t e x t:</p>
		<textarea name= 'context' cols = '50' rows = '7'></textarea></br></br></b>
		</div>
     <input type = 'submit' value = 'Send It' ><hr>
   </form>
  <?php
    }
	function write ( $name , $text ){
		$fp = fopen ( "123.txt" , "a+" ) ;
		fwrite ( $fp , $name ) ;
		fwrite ( $fp , "\r\n" ) ;
		fwrite ( $fp , $text ) ;
		fwrite ( $fp , "\r\n"  ) ;
    }
    function read ( ){
		$out = fopen ( "123.txt" , "r+" ) ;
		while ( !feof($out) ){
			echo fgets( $out );
			echo " said:</br>" ;
			echo fgets ( $out ) ;
			fgetc ( $out ) ;
			echo "</br></br>" ;
		}
	}
	normal() ;
	$_SESSION [ 'Send It' ] = false ;
    if ( isset ( $_POST [ 'fname' ] ) ){
		$_SESSION [ 'Send It' ] = true ;
	}
    else{
		$_SESSION [ 'Send It' ] = false ;
	}
	
	if ( $_SESSION [ 'Send It' ] == true ){
		if ( !$_POST [ 'fname' ] ){
			echo "Error Name Input</br>" ;
		}
        if ( !$_POST [ 'context' ] ){
			echo "Error Context Input</br>" ;
		}
        else{
			$name = $_POST [ 'fname' ] ;
			$text = $_POST [ 'context' ] ;
			write ( $name , $text ) ;
		}
    }
	read() ;
  ?>
 
 </body>
</html>
