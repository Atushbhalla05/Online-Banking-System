<?php
    // Developer: Juan Romano and Atush Bhalla
    class BankDataBase{
        private $DB;

        public function __construct(){
            try{
                $this->DB = new PDO('mysql:dbname=ajbankdb; charset=utf8; host=127.0.0.1', 'root', '');
                $this->DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }

            catch(PDOException $e){
                echo ('Error Establishing Connection');
                Exit();
            }
        }

        
        public function Register_User($First_Name, $Last_Name, $UserName, $Password, $SSN, $DOB, $Email, $Phone){
            $stmt = $this->DB->prepare(
                "insert into client (First_Name, Last_Name, Username, Password, SSN, DOB, Email, Phone) values (
                    '".$First_Name."',
                    '".$Last_Name."',
                    '".$UserName."',
                    '".$Password."',
                    '".$SSN."',
                    '".$DOB."',
                    '".$Email."',
                    '".$Phone."');"
                );
                $stmt-> execute();

                $today = getdate();
                $date = $today['mon'] .'/'. $today['mday'] .'/'. $today['year'];
                $amount = 0.00;
                $balance = 0.00;
                $stmt2 = $this->DB->prepare("insert into action (Date, Action, Amount, Balance, username) values ('".$date
                    ."','Register','" . $amount . "','" . $balance . "', '". $UserName."');");
                $stmt2->execute();
            
        }

        public function Login_User($username,$password){
            $sql = "select * from client where username = '".$username."' and password='".$password."';";
            $user = $username;
            $result = $this->DB->query($sql);
            return ($result->rowCount()>0);
        }
        public function clientData($username){
            //$everything has everything in the outline.html only the div. (action for Juan)
            $everything = "helllo";
            return $everything;
        }
    }
?>
