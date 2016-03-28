<?php

include_once 'database_connection.php';



function check_token($token){
    $sql = "SELECT * FROM TOKENS WHERE token="+$token;
        $result = mysql_query($sql);
                $result = mysql_fetch_array($result);
        $tokid = $result['tokid'];
        echo $tokid;
}



?>