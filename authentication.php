<?php

include 'database_connection.php';

$request_type = $_GET['request_type'];

echo $request_type;

if($request_type == "create_user"){
            $sql = "INSERT INTO USER_ACCOUNTS (uname, fname, lname,email,pass,prof_id,acctype_id,acc_statid)
        VALUES ('John', 'Doe',,'Doe', 'john@example.com','somepass',1,2,3)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}


function fetch_create_user_request(){
    $uname = $_POST['uname'];
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$pass= $_POST['pass'];
$prof_id= $_POST['prof_id'];
$acctype_id= $_POST['acctype_id'];
$acc_statid= $_POST['acc_statid'];


create_user($uname,$fname,$lname,$email,$pass,$prof_id,$acctype_id,$acc_statid);

}

function create_user($uname,$fname,$lname,$email,$pass,$prof_id,$acctype_id,$acc_statid){
    
    

    
}



?>