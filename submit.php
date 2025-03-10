<?php

    require "conn.php";

    $id = $_GET['id'];
    $num = $_GET['num'];

    if(isset($_POST['submit'])){
        $output = $_POST['output'];
        $numbers = "";
        $position = 0;
        $n = 0;

        echo "$output";

        $digits = str_split($output);

        $size = sizeof($digits);

        echo "<br>";

        for($i=2; $i<$size; $i++){
            $numbers .= $digits[$i];
        }

        $percentage = ($size-2);

        echo "<br>";

        echo $percentage;

        echo "<br>";

        echo $numbers;

        echo "<br>";

        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($id === $row['userkey']){
                    $query2 = "UPDATE users SET percentage = '$percentage', numbers = '$numbers' WHERE userkey = '$id'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        header("location:numbers2.php?num=$num");
                        echo "Record for user $id updated successfully!";
                    }
                    else{
                        echo "Error while updating record!";
                    }
                }
            }
        }

    }