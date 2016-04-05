<?php

include_once 'database_connection.php';

echo json_encode(getProfile($_POST['accid']));




function getProfile($accid){
    
    $sql = "SELECT prof_id FROM USER_ACCOUNTS where accid=". $accid;
    $result = mysql_query($sql);
    $result = mysql_fetch_array($result);
    
    $prof_id = $result['prof_id'];
    
    $sql = "SELECT location, name, description, media_id FROM PROFILES WHERE prof_id='" . $prof_id . "'";
    $result = mysql_query($sql);
    $result = mysql_fetch_array($result);
    
    
    $profile = array([
        "location" => $result['location'],
        "name" => $result['name'],
        "description" => $result['description'],
        "media_id" > $result['media_id']
    ]);
    
    return $profile;
}

?>