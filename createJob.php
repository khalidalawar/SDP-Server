<?php

insertJob($_POST['cust_accid'], $_POST['desc'], $_POST['subcat_id'], $_POST['lifetime'], $_POST['job_statid']);

function insertJob($cust_accid, $desc, $subcat_id, $lifetime, $job_statid){
    $insert = "INSERT INTO JOBS (ts, cust_accid, description, subcat_id, lifetime, job_statid)
                VALUES (now(), ". $cust_accid .", ". $desc .", ". $subcat_id .", ". $lifetime .", ". $job_statid .")";
    if(!mysql_query($insert)){
        echo "Error: could not insert job!";
    }
}

?>