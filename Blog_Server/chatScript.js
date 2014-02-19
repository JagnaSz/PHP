var chatAvailable;
window.onload = showOrHideChar();
window.setTimeout("receive();", 1000);
function showOrHideChar()
{
    if(document.getElementById('checkbox').checked)
    {   
        document.getElementById('chatWindow').style.display="block";
        chatAvailable = true;
        receive();
    }
    else
    {
        document.getElementById('chatWindow').style.display="none";
		chatAvailable = false;
    }
}

function send()
{
    var message = document.getElementById('message').value;
    var nick = document.getElementById('nick').value;
	
    if(nick.length == 0 || nick.length > 15 )
        alert("B£ÊDNY NICK!\nMusi zawieraæ od 1 do 15 znaków.");    
	else if(message.length == 0 || message.length > 100)
		alert("B£ÊDNA WIADOMOŒÆ!\nMusi zawieraæ od 1 do 100 znaków.");
    else
    {
        newMessage = new XMLHttpRequest();
        newMessage.open("GET","send.php?nick="+nick+"&message="+message, true);
        newMessage.send();
    }
}

function receive()
{
	if(chatAvailable)
	{
		request = new XMLHttpRequest();   
		request.onreadystatechange = function() 
		{
			if(request.readyState == 3 && request.status == 200)
			{
				document.getElementById('textArea').value = request.responseText;
			}
			if(request.readyState == 4 && request.status == 200)
			{
				request.open("GET","receive.php", true);
				request.send();
			}
		}
		request.open("GET","receive.php", true);
		request.send();
	}
}