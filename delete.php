<?php

    require "conn.php";

    $query = "TRUNCATE TABLE users";
    $result = mysqli_query($db, $query);

    if($result){
        header("location:index.html");
    }
    else{
        echo "Error while truncating table!";
    }