<!-- Atush Bhalla -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AJ Bank</title>
</head>
<body>
	<div id="page">
		UserName:<input type="text" id="username" required><br> 
		Password: <input type="password" id="password" required><br>
		<input type="submit" value="login" onclick="checkDetails(); return false"><br>
		Don't have an account?  <a href = "RegisterClient.php"> Register</a>
	</div>
	<script>
		function checkDetails(){
			
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;

			
			 var ajax = new XMLHttpRequest();
			 ajax.open('GET', 'Controller.php?username=' + username + '&password=' + password,true);
	         ajax.send();
	         ajax.onreadystatechange = function () {
	           	if (ajax.readyState == 4 && ajax.status == 200) {
		           	var cover = ajax.responseText;
	                document.getElementById("page").innerHTML = cover;
	           	}
	         }
		}
		function newRegister(filename){
			document.getElementById("page").src = filename;
		}
    
    </script>
</body>
</html>