<?php

    require "conn.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];

        $exist = false;

        $userkey = rand(100000, 999999);

        $query0 = "SELECT * FROM users";
        $result0 = mysqli_query($db, $query0);

        if(mysqli_num_rows($result0)>0){
            for($i=0; $i<mysqli_num_rows($result0); $i++){
                $row = mysqli_fetch_array($result0);

                if($userkey === $row['userkey']){
                    $userkey = rand(100000, 999999);
                }
            }
        }

        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result)>0){
            for($i=0; $i<mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result);

                if($username === $row['username']){
                    $exist = true;
                    $message = "User already exist, try another username";
                    break;
                }
            }
        }
        else{
            $query2 = "INSERT INTO users(username, userkey) VALUES('$username', '$userkey')";
            $result2 = mysqli_query($db, $query2);

            if($result2){
                header("location:home.php?id=$userkey");
            }
        }

        if($exist){
            $query2 = "INSERT INTO users(username, userkey) VALUES('$username', '$userkey')";
            $result2 = mysqli_query($db, $query2);

            if($result2){
                header("location:home.php?id=$userkey");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pi Day</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <center>
        <fieldset>
            <div class="pi-symbol">π</div><br>
            <?php echo "<p class='message'>$message</p><br>";?>
        </fieldset>
    </center>
</body>
</html>