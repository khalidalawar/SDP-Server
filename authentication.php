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


echo $email . '\n';
echo $pass . '\n';
create_user($uname,$fname,$lname,$email,$pass,$prof_id,$acctype_id,$acc_statid);

}

function create_user($uname,$fname,$lname,$email,$pass,$prof_id,$acctype_id,$acc_statid){
    
     $sql = "INSERT INTO USER_ACCOUNTS (uname, fname, lname,email,pass,prof_id,acctype_id,acc_statid) VALUES ('" . $uname . "', '" . $fname . "','" . $lname . "', '" . $email . "','" . $pass . "',1,2,3)";

        if (mysql_query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    
}



?>