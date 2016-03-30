<?php

$imagefor = $_POST['imagefor'];

if($imagefor == "profile"){
    $accountID = $_POST['accid'];
    
    $sql = "SELECT path 
            FROM MEDIA_FOLDERS AS M, PROFILES AS P, USER_ACCOUNTS AS U
            WHERE U.prof_id=P.prof_id AND P.media_id=M.media_id
                AND U.accid='" . $accoundID . "'";
    $result = mysql_query($sql);
    $result = mysql_fetch_assoc($result);
    $path =  $result['path']; 
    
    
    echo json_encode([
        "path" => $path
    ]);
    
} else if($imagefor == "job"){
    $jobtID = $_POST['jobid'];
    
}


?>