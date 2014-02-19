<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodaj nowy wpis.</title>
</head>
<body>
	<?php 
		include('menu.php');
	?>
  <form onsubmit="return isValidDate()" enctype="multipart/form-data" name="Form" action="wpis.php" method="POST">
    <p>Nazwa użytkownika <br /><input type="text" name="user"></p>
    <p>Hasło <br /><input type="password" name="pass"></p>
    <p>Wpis <br /><textarea name="wpis" rows="5" cols="50">Wpis...</textarea></p>
    <p>Data <br /><input type="text" name="data" value=""></p>
	<p>Godzina <br /><input type="text" name="hour" value=""></p>
    <p>Załączniki: <br /> </p>
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    <span style ="font-family:Arial">Click to add files</span>&nbsp;&nbsp;
    <input id="Button1" type="button" value="add" onclick = "AddFileUpload()" />
    <br /><br />
    <div id = "FileUploadContainer">
        <!--FileUpload Controls will be added here -->
    </div>
    <br />
    <asp:Button ID="btnUpload" runat="server"
      Text="Upload" OnClick="btnUpload_Click" />
    <p>Resetuj dane <br /> <input type="reset" value="Reset" /></p>
    <p>Wyślij dane <br /> <input type="submit" value="Wyślij" /></p>		
  </form>
	
	 <script>
	 var counter = 1;
	 function AddFileUpload()
	 {
	      var div = document.createElement('DIV');
	      div.innerHTML = '<input id="file' + counter + '" name = "plik' + counter +
	                      '" type="file" />' +
	                      '<input id="Button' + counter + '" type="button" ' +
	                      'value="Remove" onclick = "RemoveFileUpload(this)" />';
	      document.getElementById("FileUploadContainer").appendChild(div);
	      counter++;
	 }
	 function RemoveFileUpload(div)
	 {
	      document.getElementById("FileUploadContainer").removeChild(div.parentNode);
	 }


	 
			var today = new Date();
			var day = today.getDate();
			var year = today.getFullYear();
			var month = today.getMonth()+1;

			if(parseInt(day)<10)
				day = "0"+day;
			if(parseInt(month) < 10)
				month = "0" + month;

			document.getElementsByName('data')[0].value= year +"-"+month+"-"+day;
	 	
			var hours = today.getHours();
			var minutes = today.getMinutes();

			if(hours < 10)
				hours = "0"+hours;
			if(minutes<10)
				minutes = "0"+minutes;
			
			document.getElementsByName('hour')[0].value = hours +":"+minutes;
	 	
			
			function isValidDate()
			{
				var date = document.getElementsByName("data")[0].value;
			    var matches = /^(\d{4})[-](\d{2})[-](\d{2})$/.exec(date);
			    if (matches == null){
				    alert("Pusta data");
					document.getElementsByName("data")[0].value = year +"-"+month+"-"+day;
				     return false;

			    }
				var y = parseInt(date.substr(0,4));
				var m = parseInt(date.substr(5,7));
				var d = parseInt(date.substr(8,10));
				if(m<0 || m>12){
					alert("Zły miesiąc");
					document.getElementsByName("data")[0].value = year +"-"+month+"-"+day;
					return false;
				}
				
				var limit;
				if(m==1||m==3||m==5||m==7||m==8||m==10||m==12){
					limit = 31;
				}
				else if(m==2){
					 limit=28;
				}
				else
					 limit = 30;

				if(d<0 || d>limit){
					alert("Zły dzień");
					document.getElementsByName("data")[0].value = year +"-"+month+"-"+day;
					return false;
				}	

				var time = document.getElementsByName("hour")[0].value;
				console.log(time);
			    var m = /^(\d{2})[:](\d{2})$/.exec(time);
			    var ho = parseInt(time.substr(0,2));
				var mi = parseInt(time.substr(3,5));
				
			    if (m== null){
				    alert("Pusta godzina");
				    var t = new Date();
				    var h = t.getHours();
					var m = t.getMinutes();

					if(parseInt(h) < 10)
						h = "0"+h;
					if(parseInt(m)<10)
						m = "0"+m;
					
					document.getElementsByName('hour')[0].value = h +":"+m;
				     return false;
			    }
				else if(ho<0 || ho>24 || mi<0 || mi>59){
					
					alert("Zła godzina");
					 var t = new Date();
					    var h = t.getHours();
						var m = t.getMinutes();

						if(parseInt(h) < 10)
							h = "0"+h;
						if(parseInt(m)<10)
							m = "0"+m;
						
						document.getElementsByName('hour')[0].value = h +":"+m;
					return false;
				}

			}
			

			</script>
</body>
</html>
