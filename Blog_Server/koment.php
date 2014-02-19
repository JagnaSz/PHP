<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodano komentarz.</title>
</head>
<body>

		<ul>
  		  	<li><a href="blog.php" style="text-decoration: none">Powrót</a></li>
    	</ul>

 <?php
 
 	$folder = $_POST['blog'];
 	$wpis = $_POST['notka'];

 	$numer = 0;
	 if(!is_dir($folder . "/" . $wpis.".k")) 
 		mkdir($folder . "/" . $wpis.".k");
 
	 $dir = dir($folder . "/" . $wpis.".k");
	 while(($file= $dir->read())!=null){
	 	if($file != "." && $file != ".."){
	 		$numer++;
	 	}
	 	
	 	$fpl = fopen("semafor.txt","r+");
	 	if (flock($fpl, LOCK_EX)){
	 		$kom = fopen($folder . "/" . $wpis.".k" . "/" . $numer, "w");
	 		
	 		fwrite($kom, $_POST['kom'] ."\r\n");
			fwrite($kom, date('Y-m-d') . ", " . date('G:i') ."\r\n" );
	 		fwrite($kom, $_POST['sign'] . "\r\n");
	 		fwrite($kom,trim($_POST['Opis'], " \r\n") );
	 		
	 		fclose($kom);
	 		
	 		flock($fpl, LOCK_UN);
	 		fclose($fpl);
	 	}else echo "Błąd semafora";
	 }
 
 ?>
 
 </body>
 </html>