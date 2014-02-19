<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Stwórz nowy blog.</title>
</head>
<body>
	<?php 
		include('menu.php');
	?>
  <form action="nowy.php" method="POST">
    <p>Nazwa bloga <br /><input type="text" name="name" /></p>
    <p>Nazwa użytkownika <br /><input type="text" name="user"></p>
    <p>Hasło <br /><input type="password" name="pass"></p>
    <p>Opis <br /><textarea name="opis" rows="5" cols="50">Opis...</textarea></p>
    <p>Resetuj dane <br /> <input type="reset" value="Reset" /></p>
    <p>Wyślij dane <br /> <input type="submit" value="Wyślij" /></p>		
  </form>
	
</body>
</html>
