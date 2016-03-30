

<?php

//expects a FILE with the label 'file'
//also expects two values from the &_POST method:
//variable type: either profile or job
//variable accid: with the user's account ID
//
//in case 'type' = "job" :::
//also expects a value jobId which is the jobid insted of accid

if(isset($_FILES['file'])){
    $uploadOk = 1;
    
    if(getimagesize($_FILES["image"]["tmp_name"]) === false){
        echo "File is not an image.";
        $uploadOk = 0;
    } else{
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            echo "File format not allowed";
            $uploadOk = 0;
        }        
    }
    
if($uploadOk == 1){    
    $type = $_POST["type"]; 
    
      
    if($type == "profile"){
        $userID = $_POST["accid"];
        
        $target_dir = "uploads/" . "PROF" . userID;
        if(!file_exists($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        
        $target_dir = $target_dir . "/" . basename($_FILES["file"]["name"]);
        
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)){
            echo json_encode([
            "Message" => "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.",
            "Status" => "OK",
            "userId" => $_REQUEST["userId"]
            ]);
        } else {
            echo json_encode([
            "Message" => "Sorry, there was an error uploading your file.",
            "Status" => "Error",
            "userId" => $_REQUEST["userId"]
            ]);
        }
        
        $mediaID = saveInDB($target_dir); //returns the media id
        $sql = "UPDATE PROFILES AS P, USER_ACCOUNTS AS U SET P.media_id='" . $mediaID . "' 
        WHERE U.prof_id=P.prof_id AND U.accid='" . $userID . "'";
        
        if (mysql_query($sql) === TRUE){
            echo "profile media update success!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
                
    }else if($type == "job"){
        $jobID = $_POST["jobid"];
                
        $target_dir = "uploads/" . "JOB". jobID;
        if(!file_exists($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        
        $target_dir = $target_dir . "/" . basename($_FILES["file"]["name"]);
        
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)){
            echo json_encode([
            "Message" => "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.",
            "Status" => "OK",
            "userId" => $_REQUEST["userId"]
            ]);
        } else {
            echo json_encode([
            "Message" => "Sorry, there was an error uploading your file.",
            "Status" => "Error",
            "userId" => $_REQUEST["userId"]
            ]);
        }
        
        $mediaID = saveInDB($target_dir); //returns the media id
        $sql = "UPDATE JOBS SET media_id='" . $mediaID . "' WHERE cust_accid='" . $userID . "'";
        
        if (mysql_query($sql) === TRUE){
            echo "job media update success!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }else echo "Invalid request!";

} //uploadOk if-statement
} //isset if-statement


function saveInDB($filePath){
    $insertTime = time();
    $sql = "INSERT INTO MEDIA_FOLDERS (ts, path) VALUES (now(), '" . $filePath . "')";
    if (mysql_query($sql) === TRUE){
        echo "new media success!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql = "SELECT media_id FROM MEDIA_FOLDERS WHERE path='" . $filePath . "'";
    $result = mysql_query($sql);
    $result = mysql_fetch_assoc($result);
    return $result['media_id'];
}
    
}

?>