<?php
    require 'constants.php';
    //connection com db
    $connection = new mysqli(db_host, db_username, db_password, db_name);
    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
