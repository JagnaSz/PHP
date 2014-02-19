<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Wybierz blog</title>
</head>
<body>
	
<?php 
	$text = iconv("ISO-8859-2","UTF-8","Strona g³ówna");
	echo '<h5>Nawigacja:</h5>
<ul>
<li><a href="zaloz.php" style="text-decoration: none">Nowy blog</a></li>
<li><a href="nowywpis.php" style="text-decoration: none">Nowy wpis</a></li>
<li><a href="blog.php" style="text-decoration: none">'.$text.'</a></li>
</ul>
';
	
	echo '
	<div id="whole" align="center">' . iconv("ISO-8859-2","UTF-8","open/hide chat") . '
			 <input type="checkbox" id="checkbox" onchange="showHideChat()" />
	
			<div id="chatWindow" resize="both">
				<textarea readonly name="chatMessages" id="textArea" style="color:black; background-color: white" rows="25" cols="100"></textarea><br/>
				<input type="text" name="nick" id="nick" value="nick" style="color:black; background-color: white"/>
				<input type="text" name="message" id="message" size="70" value="message" style="color:black; background-color: white"/>
				<button type="submit" onclick="send()">'. iconv("ISO-8859-2","UTF-8","Send message"). '</button>
			</div>
		
	</div>
	
	<script src="chatScript.js"></script>';
?>
	

</body>
</html>
