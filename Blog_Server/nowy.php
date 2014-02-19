<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Blog został stworzony.</title>
</head>
<body>

		<ul>
  		  	<li><a href="blog.php" style="text-decoration: none">Powrót</a></li>
    	</ul>
 <?php
 	$folder = strtolower($_POST['name']);
	if(!is_dir($folder)){
		mkdir ($folder);
		
		$fpl = fopen("semafor.txt","r+");
		if (flock($fpl, LOCK_EX)){
			$fp = fopen($folder . "/info.txt", "w");
		
			fwrite($fp, $_POST['user'] . "\r\n");
			fwrite($fp, md5($_POST['pass']) . "\r\n");
			fwrite($fp, $_POST['opis'] . "\r\n");
			fclose($fp);
		
			echo  "Zapisano dane.";
			flock($fpl, LOCK_UN);
			fclose($fpl);
			
		
		} else echo "Błąd semafora";	
	}
	else
		echo "Katalog o podanej nazwie istnieje!";

 ?>	
	
</body>
</html>
