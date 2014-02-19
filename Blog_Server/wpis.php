<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodano wpis</title>
</head>
<body>

		
		<ul>
  		  	<li><a href="blog.php" style="text-decoration: none">Powrót</a></li>
    	</ul>
 <?php
	
 	if (is_dir(".")) {
    	  if ($dh = opendir(".")) {
            while (($file = readdir($dh)) !== false) {
              if(file_exists($file . "/info.txt")){
		$fp = fopen($file . "/info.txt" , "r");
		if($fp != null){		
		  $user = trim(fgets($fp)," \r\n");
		  $pass = trim(fgets($fp)," \r\n");
	         
	          if(($user== $_POST['user']) && ($pass==md5($_POST['pass']))){
	          
	          	$fpl = fopen("semafor.txt","r+");
	          	
	          	if (flock($fpl, LOCK_EX)){
	          		
	          		
	          		$nowaData = explode("-", $_POST['data']);
	          		$nowaGodzina =explode(":", $_POST['hour']);
	          		$nazwa = $nowaData[0].$nowaData[1].$nowaData[2].$nowaGodzina[0].$nowaGodzina[1]. date("s")."0";
	          		$unique = 0;
	          		if(!strrpos($file, ".") && strrpos($file,$nazwa)){
	          			$uniq = substr($file,strlen($nazwa),1);
	          			if($unique == $uniq)
	          				$unique++;
	          		}
	          			
	          		$f = fopen($file . "/" . $nazwa . $unique, "w");
	          		fwrite($f, $_POST['data'] . "\r\n");
	          
	         	 	fwrite($f,$_POST['wpis'] . "\r\n");
	          		fclose($f);
	          	
	          		$plik_tmp1 = $_FILES['plik1']['tmp_name'];
	          		$plik_tmp2= $_FILES['plik2']['tmp_name'];
	          		$plik_tmp3 = $_FILES['plik3']['tmp_name'];
	          		$odcz1 = pathinfo($_FILES['plik1']['name']);
	          		$odcz2 = pathinfo($_FILES['plik2']['name']);
	          		$odcz3 = pathinfo($_FILES['plik3']['name']);
	          	
		          	$plik_nazwa1 =  $nazwa .$unique ."1." . $odcz1['extension'];
		          	$plik_nazwa2 =  $nazwa .$unique."2." . $odcz2['extension'];
		          	$plik_nazwa3 =  $nazwa .$unique."3." . $odcz3['extension'];
		          	
	         
		          	
		          	if(is_uploaded_file($plik_tmp3)) {
		          		if(move_uploaded_file($plik_tmp3, $file . "/" . $plik_nazwa3))
		          			echo "ok <br />";
		          		else
		          			echo "Zbyt duża wielkość pliku.";
		          	}
		          	
		          	if(is_uploaded_file($plik_tmp1)) {
		          		if(move_uploaded_file($plik_tmp1, $file . "/" . $plik_nazwa1))
		          			echo "ok <br />";
		          		else
		          			echo "Zbyt duża wielkość pliku.";
		          	}
		          	
		          	if(is_uploaded_file($plik_tmp2)) {
		          		if(move_uploaded_file($plik_tmp2, $file . "/" . $plik_nazwa2))
		          			echo "ok <br />";
		          		else
		          			echo "Zbyt duża wielkość pliku.";
		          	}
		          	
		    	echo "Dane są poprawne!Tworzę plik...";
		    	flock($fpl, LOCK_UN);
		    	fclose($fpl);
		    	
	          }else echo "Błąd semafora";
            
			}
	      
          }
         }
	     fclose($fp);
	   }
	   
           closedir($dh);
	
        }
      }

 ?>	
	
</body>
</html>
