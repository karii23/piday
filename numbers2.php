<?php

    require "conn.php";

    $users = $_GET['num'];
    $n = 0;

    $number = intval($users);

    $query = "SELECT * FROM users";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $n++;
        }
    }

    echo $n;
    echo "<br>";
    echo $number;
    echo "<br>";

    if($n >= $number){
        header("location:scoreboard.php");
    }
    else{
        header("location:names.php?num=$number");
    }
        