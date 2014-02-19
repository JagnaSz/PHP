<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Wybierz blog</title>
</head>
<body>
	<form action="blog.php" method="GET">
		<input type="text" name="nazwa" />
		<input type="submit" name="submit" value="Wyślij" />
	</form>

	
	
	<?php 
	include('menu.php');
	
	if(isset($_GET['submit'])){
		if(empty($_GET['nazwa'])){
			echo "<h1>Lista dostępnych blogów</h1><br />";
			if (is_dir(".")) {
				if ($dh = opendir(".")) {
					while (($file = readdir($dh)) !== false) {
						if(is_dir($file) && $file!==".." && $file!=="."){
							echo "<p><a href=blog.php?nazwa=". $file ."&submit=Wyślij>$file</a></p>";
						}
					}
				}
			}
		}
		elseif(!is_dir($_GET['nazwa']))
			echo "<h3>Nie ma takiego bloga!</h3>";
		else{
			
			echo "<h5>O moim blogu:</h5>";
					$plik = file("./".$_GET['nazwa'] . "/info.txt");
					$num_l = count($plik);
					for($i=2;$i< $num_l;$i++)
						echo $plik[$i];
			
			
			$fold ="./".$_GET['nazwa']; 
			if (is_dir($fold)) {
				
    	  		if ($d = opendir($fold)) {
					//echo "Otworzono " .$fold ;
    	  			echo "<h2>Wpisy</h2>";
            		while (($p = readdir($d)) !== false) {
            				
						if(!strrpos($p, ".") && $p !== ".." && $p !== "." ){
							
							$wpisy = fopen($fold . "/" . $p , "r");
							
 							while(!feof($wpisy))
								echo fgets($wpisy) . "<br />";
 							fclose($wpisy);
 							
 							$f ="./".$_GET['nazwa'];
 							if(is_dir($f)){
 								if($pl = opendir($f)){
 									while(($b = readdir($pl)) !== false){
 										if(strstr($b,$p) && strrpos($b, ".") && !strrpos($b, ".k") && $b !== "info.txt"){
 											echo '<a href="'.$f."/". $b.'">' .$b. '</a><br />';
 										}	
 									
 									}
 								}
 							}
							echo '<form method="POST" action="nowykom.php">
							<input type="submit" value="Skomentuj" />
							<p><input type="hidden" name="nazwa_b" value="'. $_GET['nazwa'].'" /><p>
							<p><input type="hidden" name="nazwa_w" value="'.$p.'" /></p>
							</form>
							';  
							echo "<h5>Komentarze:</h5>" ;	
							$kom = $fold . "/" .$p . ".k";
							if(is_dir($kom)){
								if($k = opendir($kom)){
									while(($a = readdir($k)) !== false){
										if($a !== "." && $a !== ".."){
											$komentarz = file($kom . "/" . $a);
											$linie = count($komentarz);	
											
											echo "Komentarz " . $komentarz[0] . "<br />";
											echo "Data: " . $komentarz[1] . "<br />";
											echo "Napisał/a: " . $komentarz[2] . "<br />";
											echo "Treść: <br />";
											for($j = 3; $j < $linie; $j++)
												echo  $komentarz[$j] . "<br />";
											echo "* <br />";
										}										
									}
								}
							
								closedir($k);
							}else echo "Brak komentarzy <br />";
							echo "**************************************** <br />";
						}
						
					}
					closedir($d);
				}	
				
			}
		
		
	}
}
	?>

</body>
</html>
