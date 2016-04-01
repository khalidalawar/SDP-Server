<?php


function getProfile($prof_id){
    $sql = "SELECT location, name, description, media_id FROM PROFILES WHERE prof_id='" . $pof_id . "'";
    $result = mysql_query($sql);
    $result = mysql_fetch_assoc($result);
    
    
    $profile = array(
        "location" : $result['location'],
        "name" : $result['name'],
        "description" = $result['description'],
        "media_id" = $result['media_id']
    );
    
    return $profile;
}

?>