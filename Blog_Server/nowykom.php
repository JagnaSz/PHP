<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodaj komentarz.</title>
</head>
<body>
	<?php 
		include('menu.php');
	?>
  <form action="koment.php" method="POST">
    <p>Rodzaj komentarza <br />
    <select name="kom" size="1">	
    <option>Pozytywny</option>
    <option>Negatywny</option>
    <option>Neutralny</option>
    </select>
    </p>
    <p>Komentarz <br /><textarea name="Opis" rows="5" cols="50">Komentarz...</textarea></p>
    <p>Imię/Nazwisko/Pseudonim <br /><input type="text" name="sign"></p>
    <p>Resetuj dane <br /> <input type="reset" value="Reset" /></p>
     <p>Wyślij dane <br /> <input type="submit" value="Wyślij" /></p>
    <p> <input type="hidden" name="notka" value="<?php echo $_POST['nazwa_w'];?>" /></p>
    <p><input type="hidden" name="blog" value="<?php echo $_POST['nazwa_b'];?>" /> </p>
     
  </form>

</body>
</html>
