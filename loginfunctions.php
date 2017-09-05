<?php  

require 'dbconn.php';  
session_start();
    class dbFunction {  
            
        function __construct() {    
               
        }  
        function __destruct() {  
              
        }  
        public function UserRegister($firstname,$lastname, $emailid,$phone, $password){ 
	
                $password = md5($password);  
                $qr = mysql_query("INSERT INTO registers(firstname,lastname,email,phonenumber,password) values('".$firstname."','".$lastname."','".$emailid."','".$phone."','".$password."')") or die(mysql_error());  
                return $qr;  
               
        }  
        public function Login($emailid, $password){  
            $res = mysql_query("SELECT * FROM registers WHERE email = '".$emailid."' AND password = '".md5($password)."'");  
            $user_data = mysql_fetch_array($res);  
            //print_r($user_data);  
            $no_rows = mysql_num_rows($res);
           // echo $user_data['id'];  
             // echo "<script>alert('Helo')</script>";
            if ($no_rows > 0)   
            {  
                $_SESSION['login'] = true;  
                $_SESSION['userid'] = $user_data['user_id'];  
                $_SESSION['userfirstname'] = $user_data['firstname'];  
                $_SESSION['email'] = $user_data['email'];  
					return TRUE;  
            }  
            else  
            {  
                return FALSE;  
            }  
               
                   
        }  
        public function isUserExist($emailid){    
            $qr = mysql_query("SELECT * FROM registers WHERE email = '".$emailid."'");  
            $row = mysql_num_rows($qr);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }  
    }  
?>

