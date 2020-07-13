<?php
// Developer: Juan Romano
include "./Model.php";
$theDBA = new BankDataBase();

if (isset($_GET['username'])) {
    $password = $_GET['password'];
    $username = $_GET['username'];
    if ($theDBA->Login_User($username, $password)) {
        echo $theDBA->clientData($username);
    } else {
        echo "<div id='page'>
		UserName:<input type='text' id='username' required><br> 
		Password: <input type='password' id='password' required><br>
		<input type='submit' value='login' onclick='checkDetails(); return false'><br>
		Don't have an account?  <a href = 'RegisterClient.php'> Register</a>
	    </div>Username and Password are not found or do not match";
    }
}
if (isset($_GET['deposit'])) {
    echo json_encode($theDBA->Get_Question($_GET[], ''));
}

if (isset($_GET['withdraw'])) {
    echo json_encode($theDBA->Get_Question($_GET[], ''));
}

if (isset($_GET['register'])) {

    $FN = $_GET['firstname'];
    $LN = $_GET['lastname'];
    $UN = $_GET['username'];
    $PW = $_GET['password'];
    $SSN = $_GET['ssn'];
    $DOB = $_GET['dob'];
    $EMAIL = $_GET['email'];
    $PN = $_GET['phonenumber'];

    $theDBA->Register_User($FN, $LN, $UN, $PW, $SSN, $DOB, $EMAIL, $PN);

}

?>