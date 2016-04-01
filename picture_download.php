<?php

//expecting a variable 'imagefor' with a value profile or job
//if imagefor=profile, php expects a variable 'accid' with the account id
//if imagefor=job, php expects a variable 'jobid' with the job id 

$imagefor = $_POST['imagefor'];

if($imagefor == "profile"){
    $accountID = $_POST['accid'];
    
    $get_dir = "uploads/" . "PROF" . $accountID;
    $files = scandir($get_dir);
    
    $imagesArray = array(null);
    foreach($files as $file){
        if(is_uploaded_file($file)){
            $imagePath = realpath($file);
            array_push($imagesArray, {"name":$file, "image":$imagePath});
        }
    }
    
    header("content-type: image/png"); //assuming the format is jpeg
    echo json_encode($imagesArray);
    
} else if($imagefor == "job"){
    $jobID = $_POST['jobid'];
    
    $get_dir = "uploads/" . "JOB" . $jobID;
    $files = scandir($get_dir);
    
    $imagesArray = array(null);
    foreach($files as $file){
        if(is_uploaded_file($file)){
            $imagePath = realpath($file);
            array_push($imagesArray, {"name":$file, "image":$imagePath});
        }
    }
    
    header("content-type: image/png"); //assuming the format is jpeg
    echo json_encode($imagesArray);
}

// $imagefor = $_POST['imagefor'];

// if($imagefor == "profile"){
//     $accountID = $_POST['accid'];
    
//     $sql = "SELECT path 
//             FROM MEDIA_FOLDERS AS M, PROFILES AS P, USER_ACCOUNTS AS U
//             WHERE U.prof_id=P.prof_id AND P.media_id=M.media_id
//                 AND U.accid='" . $accoundID . "'";
//     $result = mysql_query($sql);
//     $result = mysql_fetch_assoc($result);
//     $path =  $result['path']; 
    
//     header("content-type: image/png"); //assuming the format is jpeg
    
    
//     // readfile($path);
    
// } else if($imagefor == "job"){
//     $jobID = $_POST['jobid'];
// }


?>