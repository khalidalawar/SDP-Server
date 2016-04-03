<?php

insertBid($_POST['job_id'], $_POST['sp_accid'], $_POST['amount']);

function insertBid($job, $sp_accid, $money){
    $insert = "INSERT INTO BIDS (ts, job_id, sp_accid, amount) VALUES (now(), '". $job ."', '". $sp_accid ."', '". $money ."')";
    if(!mysql_query($insert)){
        echo "Error in inserting a new bid!!";
    }
}

?>