<?php


updateProfileInfo($_POST['prof_id'], $_POST['location'], $_POST['name'], $_POST['description']));


function updateProfileInfo($prof_id, $loc, $name, $desc){
    $sql = "UPDATE PROFILES
            SET location='" . $loc . "', name='" . $name . "', description='" . $desc . "'
            WHERE prof_id='" . $prof_id . "'";
    if(!mysql_query($sql)){
        echo "Error: could not update profile";
    }   
}

?>