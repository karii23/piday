<?php
    $num = $_GET['num'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pi Day</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="icon" type="image/X-icon" href="media/images/srss-logo-removebg-preview.png">
</head>
<body>
    <center>
        <fieldset>
            <div class="pi-symbol">π</div><br>
            <?php echo "<form action='register.php?num=$num' name='form' method='POST'>";?>
                <p class="heading">Enter name of participants</p><br>
                <input type="text" class="num" name="username" id="user"><br><br>
                <p class="alert" id="ualert"></p><br><br>
                <button onclick="next()" name="submit" class="next">Next</button><br>
            </form>
        </fieldset>
    </center>
    <script>
        function next()
        {
            if(document.form.username.value === ""){
                document.getElementById("ualert").innerHTML = "Please input username!";
                document.getElementById("user").style.border = "2px solid red";
                event.preventDefault();
            }
            else{
                document.getElementById("ualert").innerHTML = "";
                document.getElementById("user").style.border = "none";
            }

        }
    </script>
</body>
</html>