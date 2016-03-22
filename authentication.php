<?php

include_once 'database_connection.php';

$request_type = $_POST['request_type'];

//echo $request_type;

$prof_id = 0;
$token = "";
 

if($request_type == "create_user"){
    create_user_request();    
}else if($request_type == "authenticate_user"){
    authenticate_user_request();
}else{
    $token = $_POST['token'];
    $auth = authenticate_token($token);
}


function authenticate_token($token){
    $sql = "SELECT * FROM TOKENS WHERE token= ".$token;
    $result = mysql_query($sql);
    $result = mysql_fetch_array($result);
    $time =  $result['last_request']; 
    
    $time = strtotime($time);

    $curtime = time();
    echo "time " . $time;
    echo "\ncurtime: ". $curtime;
    
    if(($curtime - $time) > 300){
        echo '\nok';
    }else{
        echo 'no';
    }
    
}

function authenticate_user_request(){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];      
    authenticate_user($uname,$pass);
      
}

function create_user_request(){
    $uname = $_POST['uname'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $pass= $_POST['pass'];
    $phone = $_POST['phone'];


    create_profile($fname,$lname);
    create_user($uname,$fname,$lname,$email,$pass,$phone,$prof_id,$acctype_id,$acc_statid);

}

function create_profile($fname,$lname){
    $sql = "INSERT INTO PROFILES (name) VALUES ('" . $fname ." ". $lname . "')";
    if (mysql_query($sql) === TRUE) {
          //  echo "New profile created successfully\n";
        } else {   
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
            
        
        
}

function create_user($uname,$fname,$lname,$email,$pass,$phone , $prof_id,$acctype_id,$acc_statid){
    
            $sql = "SELECT LAST_INSERT_ID() as id";               //future race condition
                $result = mysql_query($sql);
                $result = mysql_fetch_array($result);
            $prof_id =  $result['id'];      
                
                
                
     $sql = "INSERT INTO USER_ACCOUNTS (uname, fname, lname , email , phone_number , pass , prof_id , acctype_id , acc_statid ) VALUES ('" . $uname . "', '" . $fname . "','" . $lname . "', '" . $email . "','" . $phone . "','" . $pass . "',". $prof_id .",1,1)";

        if (mysql_query($sql) === TRUE) {
         //   echo "New record created successfully";
        } else {   
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    
}

function generateRandomString($length = 50) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function authenticate_user($uname,$pass){
    
//   echo "(".$uname . " , " . $pass ." )";
    $sql = "SELECT * FROM USER_ACCOUNTS WHERE uname='".$uname."' AND pass='".$pass."'";
    $result = mysql_query($sql);
    
    if (mysql_num_rows($result)==0) {  
        
        echo 'no user/password combination found';
        
     }else{

                 
                 $rand_string = generateRandomString();
                 
               $sql = "INSERT INTO TOKENS (token,last_request) VALUES ('". $rand_string ."',now())";
             
                        if (mysql_query($sql) === TRUE) {
                         //   echo "Token created successfully";
                            
                             $sql = "SELECT LAST_INSERT_ID() as id";               //future race condition
                                $result = mysql_query($sql);
                                $result = mysql_fetch_array($result);
                            $tokid =  $result['id'];     
                            
                            
                            $update_query = "UPDATE USER_ACCOUNTS SET tokid='". $tokid ."' WHERE uname='".$uname . "'";
                            if (mysql_query($update_query) === TRUE) {
                              //  echo "tokid updated successfully";
                                    echo $rand_string;
                            }else {   
                                echo "Error: " . $update_query . "<br>" . $conn->error;
                            }
                        } else {   
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
               
               
            
     }
   
    
}



?>