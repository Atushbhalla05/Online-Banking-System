<!--Developer: Juan Romano and Atush Bhalla -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Mini Bank Account</title>
	<link rel="stylesheet" href="MainStyle.css">
</head>
<body>
	<div class='centerDiv' id='main_page'>
        <div class='Login-card'>
            <h1 class='LoginTitle'><b>Log-In</b></h1><br>
            <input type='text'     id='username' class='LoginInput' placeholder="Username" required>
            <input type='password' id='password' class='LoginInput' placeholder="Password" required>
            <input type='submit'   id='login' class='LoginButton' value="Login" onclick="checkDetails(); return false">

            <div class='LoginNoAccount'>
                <b>
                    <a>Don't have an account?
                        <a class='RegisterLink' href="RegisterClient.php"> Register</a>
                    </a>
                </b>
            </div>
        </div>
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
	                document.getElementById("main_page").innerHTML = cover;
	           	}
	         }
		}
		function newRegister(filename){
			document.getElementById("main_page").src = filename;
		}
    
    </script>
</body>
</html>