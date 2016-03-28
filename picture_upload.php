

<?php

//expects a FILE with the label 'file'
//also expects two values from the &_POST method:
//variable type: either profile or job
//variable accid: with the user's account ID
//
//in case 'type' = "job" :::
//also expects a value jobId which is the jobid

if(isset($_FILES['file'])){
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
    }else echo "Invalid request!";
}

?>