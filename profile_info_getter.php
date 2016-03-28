<?php



function editProfile($prof_id, $location, $name, $description, $media_id){
    
}

function getProfile($prof_id, $location, $name, $description, $media_id){
    $sql = "SELECT location, name, description, media_id FROM PROFILES WHERE prof_id=" . $pof_id . ";";
    $result = mysql_query($sql);
    $result = mysql_fetch_array($result);
    
    $location = $result['location'];
    $name = $result['name'];
    $description = $result['description'];
    $media_id = $result['media_id'];
}

?>