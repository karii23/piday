<?php
    require "conn.php";

    $perc = [];
    $size = 0;
    $users = [];
    $digits = [];
    $acc = [];

    $query = "SELECT * FROM users";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $perc[$size] = $row['percentage'];
            $size++;
        }
    }

    for($i=0; $i<$size-1; $i++){
        for($j=$i+1; $j<$size; $j++){
            if($perc[$i]<=$perc[$j]){
                $temp = $perc[$i];
                $perc[$i] = $perc[$j];
                $perc[$j] = $temp;
            }
        }
    }

    for($i=0; $i<$size; $i++){
        $query2 = "SELECT * FROM users";
        $result2 = mysqli_query($db, $query2);

        if($result2){
            for($j=0; $j<mysqli_num_rows($result2); $j++){
                $row = mysqli_fetch_array($result2);

                if($row['percentage'] === $perc[$i]){
                    $users[$i] = $row['username'];
                    $acc[$i] = round(($perc[$i]/300)*100, 2);
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/X-icon" href="media/images/srss-logo-removebg-preview.png">
    <title>Scoreboard</title>
    <style>
        *{
            transition: all 0.4s ease-in-out;
        }
        body
        {
            background: linear-gradient(to bottom right, #3d26eb 0%, #994aca 100%);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .logo
        {
            width: 100px;
            height: 96px;
            margin-left: 15px;
            margin-top: -12px;
            float: left;
        }
        .title
        {
            text-decoration: underline;
            color: white;
            letter-spacing: 1px;
            font-size: 40px;
            margin-right: 110px;
        }
        table
        {
            color: white;
            letter-spacing: 1px;
            border: 2px outset white;
            font-size: 30px;
            text-align: center;
            width: 60%;
            border-radius: 2px;
            box-shadow: 0px 0px 22px 8px rgb(0,0,0,0.3);
        }
        td:hover
        {
            background-color: #5315b1;
            opacity: 0.3;
        }
        .iconpos{
            width: 50px;
            height: 50px;
        }
        .delete{
            background-color: red;
            color: white;
            font-size: 20pt;
            font-family: candara;
            font-weight: bold;
            padding: 7px 25px;
            text-decoration: none;
            border-radius: 30px;
            box-shadow: 0px 0px 3px 3px rgba(255, 255, 255, 0.507);
        }
        .delete:hover{
            color: red;
            background-color: white;
            box-shadow: 0px 0px 3px 3px rgba(255, 0, 0, 0.507);
        }
        footer
        {
            text-align: right;
            color: rgb(211, 206, 206);
            font-family: sans-serif;
            margin-top: 340px;
            font-size: 18px;
            position: fixed;
        }
    </style>
</head>
<body>
    <center>
    <img src="media/images/srss-logo.jfif" class="logo">
    <p class="title">SCOREBOARD</p><br>
    <table border="1" cellspacing="0" cellpadding="20">
        <tr>
            <th>POSITION</th>
            <th>NAME</th>
            <th>SCORE</th>
            <th>ACCURACY</th>
        </tr>
        <?php
            for($i=0; $i<$size; $i++){
                $pos = $i+1;

                if($pos==1){
                    $pic = "media/icons/gold-medal.png";
                    echo 
                        "   
                            <tr>
                                <td><img src='$pic' class='iconpos'></td>
                                <td>$users[$i]</td>
                                <td>$perc[$i]</td>
                                <td>$acc[$i]%</td>
                            </tr> 
                        ";
                }
                else if($pos==2){
                    $pic = "media/icons/silver-medal.png";
                    echo 
                        "   
                            <tr>
                                <td><img src='$pic' class='iconpos'></td>
                                <td>$users[$i]</td>
                                <td>$perc[$i]</td>
                                <td>$acc[$i]%</td>
                            </tr> 
                        ";
                }
                else if($pos == 3){
                    $pic = "media/icons/bronze-medal.png";
                    echo 
                        "   
                            <tr>
                                <td><img src='$pic' class='iconpos'></td>
                                <td>$users[$i]</td>
                                <td>$perc[$i]</td>
                                <td>$acc[$i]%</td>
                            </tr> 
                        ";

                }
                else{
                    echo 
                        "   
                            <tr>
                                <td>$pos</td>
                                <td>$users[$i]</td>
                                <td>$perc[$i]</td>
                                <td>$acc[$i]%</td>
                            </tr> 
                        ";
                }                 
            }
        ?> 
    </table><br><br><br>
    <?php echo "<a href='delete.php' class='delete'>Reset</a>";?>
    </center> 
    <footer>Developed By: Karishma Chhatbar & George Maphole</footer>
</body>
</html>