<?php

include_once 'database_connection.php';

insertJob($_POST['accid'],$_POST['title'], $_POST['desc'], $_POST['subcat_id'], $_POST['lifetime']);// it is initally 1, $_POST['job_statid']);

function insertJob($cust_accid,$title, $desc, $subcat_id, $lifetime, $job_statid){
    $insert = "INSERT INTO JOBS (ts, cust_accid,title, description, subcat_id, lifetime, job_statid)
                VALUES (now(), ". $cust_accid .",".$title.", ". $desc .", ". $subcat_id .", ". $lifetime .", 1)";
    if(!mysql_query($insert)){
        echo "Error: could not insert job!";
    }else{
        echo 'successfuly inserted job';
    }
}

?>