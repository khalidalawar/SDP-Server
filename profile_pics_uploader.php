

<?php
$type = $_POST["type"];
$uname = $_POST["uname"];

$target_dir = "uploads";
if(!file_exists($target_dir))
{
mkdir($target_dir, 0777, true);
}

$target_dir = $target_dir . "/" . basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)) 
{
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

/*
ini_set("file_uploads", "on");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/
?>