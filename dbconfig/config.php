<?php
    // attempt to make connection with mysql database 'login'
    $sql_connection = mysqli_connect('localhost','root','','login');
    if($sql_connection == false){
        die("Error Occur in connection mysql" .mysqli_connect_error());
    }
?>