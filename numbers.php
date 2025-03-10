<?php

    require "conn.php";

    if(isset($_GET['submit'])){
        $users = $_GET['username'];
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

        if($n === $number){
            header("location:scoreboard.html");
        }
        else{
            header("location:names.php?num=$users");
        }
        
    }