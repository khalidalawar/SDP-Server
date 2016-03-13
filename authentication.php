<?php

include 'database_connection.php';

$request_type = $_POST['request_type'];

echo $request_type;

if($request_type == "create_user"){
       create_user_request();    
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
            echo "New profile created successfully";
        } else {   
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    $sql = "SELECT SCOPE_IDENTITY()";
     if (mysql_query($sql) === TRUE) {
            echo "retrieved last ID  successfully";
        } else {   
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
            
        
        
}

function create_user($uname,$fname,$lname,$email,$pass,$phone , $prof_id,$acctype_id,$acc_statid){
    
     $sql = "INSERT INTO USER_ACCOUNTS (uname, fname, lname , email , phone_number , pass , prof_id , acctype_id , acc_statid ) VALUES ('" . $uname . "', '" . $fname . "','" . $lname . "', '" . $email . "','" . $phone . "','" . $pass . "',1,2,3)";

        if (mysql_query($sql) === TRUE) {
            echo "New record created successfully";
        } else {   
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    
}


function authenticate_user($uname,$pass){
    $sql = "SELECT * FROM USER_ACCOUNTS WHERE uname='".$uname."' AND pass='".$pass."'";
    $result = mysql_query($sql);
    if ($result === TRUE) {
            echo "New record created successfully";
        } else {   
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
}



?>