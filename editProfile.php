<?php

include_once 'database_connection.php';

updateProfileInfo($_POST['accid'], $_POST['name'], $_POST['description']);


function updateProfileInfo($accid, $name, $desc){
    $sql = "SELECT prof_id FROM USER_ACCOUNTS where accid=". $accid;
    $result = mysql_query($sql);
    $result = mysql_fetch_array($result);
    
    $prof_id = $result['prof_id'];
    
    $sql = "UPDATE PROFILES
            SET  name='" . $name . "', description='" . $desc . "'
            WHERE prof_id='" . $prof_id . "'";
    if(!mysql_query($sql)){
        echo "Error: could not update profile";
    }else{
        echo 'update successful';
    }
}

?>