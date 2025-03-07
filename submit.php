<?php

    require "conn.php";

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $output = $_POST['output'];
        $numbers = "";
        $win = [];
        $user = [];
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

        $query0 = "SELECT * FROM users";
        $result0 = mysqli_query($db, $query0);

        if($result0){
            for($i=0; $i<mysqli_num_rows($result0); $i++){
                $row = mysqli_fetch_array($result0);

                $win[$n] = $row['percentage'];
                $user[$n] = $row['percentage'];
                $n++;
            }
        }

        $win[$n] = $percentage;
        $size = 0;

        echo "<br><br>";

        for($j=0; $j<=$n-1; $j++){
            for($k=$j+1; $k<=$n; $k++){
                if($win[$j] <= $win[$k]){
                    $temp = $win[$j];
                    $win[$j] = $win[$k];
                    $win[$k] = $temp;
                }
            }
        }

        for($w=0; $w<=$n; $w++){
            echo $win[$w];
            echo "<br><br>";

            if($percentage === $win[$w]){
                $position += ($w+1);
                $query = "SELECT * FROM users";
                $result = mysqli_query($db, $query);

                if($result){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                        $row = mysqli_fetch_array($result);

                        if($id === $row['userkey']){
                            $query2 = "UPDATE users SET numbers = '$numbers', percentage = '$percentage', position = '$position' WHERE userkey = '$id'";
                            $result2 = mysqli_query($db, $query2);

                            if($result2){
                                echo "Data successful inserted!";
                            }
                            else{
                                echo "Error while inserting data!";
                            }
                        }
                    }
                }
            }
            else{
                $position = $w+1;

                echo $position;
                echo "<br><br>";

                $query = "SELECT * FROM users";
                $result = mysqli_query($db, $query);

                if($result){
                    for($i=0; $i<mysqli_num_rows($result); $i++){
                        $row = mysqli_fetch_array($result);

                        if($user[$w] === $row['userkey']){
                            $query2 = "UPDATE users SET numbers = '$numbers', percentage = '$percentage', position = '$position' WHERE userkey = '$user[$w]'";
                            $result2 = mysqli_query($db, $query2);

                            if($result2){
                                echo "Data successful inserted!";
                            }
                            else{
                                echo "Error while inserting data!";
                            }
                        }
                    }
                }
            }
        }

        echo $position;

        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query);

        if($result){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($id === $row['userkey']){
                    $query2 = "UPDATE users SET numbers = '$numbers', percentage = '$percentage', position = '$position' WHERE userkey = '$id'";
                    $result2 = mysqli_query($db, $query2);

                    if($result2){
                        echo "Data successful inserted!";
                    }
                    else{
                        echo "Error while inserting data!";
                    }
                }
            }
        }
        


    
    }