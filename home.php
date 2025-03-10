<?php
    $id = $_GET['id'];
    $num = $_GET['num'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/X-icon" href="media/images/srss-logo-removebg-preview.png">
    <title>Home page</title>
</head>
<style>
    body
    {
        background: linear-gradient(to bottom right, #3d26eb 0%, #994aca 100%);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    .logo
    {
        width: 100px;
        height: 96px;
        margin-left: 15px;
        margin-top: 10px;
        float: left;
    }
    .mic
    {
        width: 350px;
        height: 400px;
        animation: microphone 1s infinite alternate;
        transform: scale(0.9);
        transition: all 1s ease;
        margin-right: 90px;
        cursor: pointer;
    }
    @keyframes microphone
    {
        0% {transform: scale(0.95);}
        100%{transform: scale(1);}
    }
    .appear
    {
        width: 500px;
        height: 70px;
        border-radius: 15px;
        font-size: 25px;
        padding-left: 10px;
        color: white;
        border: none;
        background-color: rgb(0,0,0,0.2);
    }
    .submit
    {
        width: 180px;
        height: 50px;
        font-size: 18px;
        border-radius: 30px;
        border: none;
    }
    .submit:hover
    {
        background: linear-gradient(to bottom right, #de5cf8 0%, #7456ee 100%);
        transition: 1s ease;
        color: white;
        box-shadow: #3a3f7c 0px 0px 2px 2px;
    }
    p
    {
        font-size: 30px;
        color: white;
        font-weight: bold;
    }
    footer
    {
        text-align: right;
        color: rgb(211, 206, 206);
        font-family: sans-serif;
        margin-top: 90px;
        font-size: 18px;
        position: fixed;
    }    
</style>
<body>
    <center>
        <img src="media/images/srss-logo.jfif" class="logo">
        <img src="media/icons/microphone.png" title="Click to speak" class="mic"><br>
        <!-- digits to appear her -->
        <?php echo "<form action='submit.php?num=$num&&id=$id' method='POST' enctype='multipart/form-data'>";?>
            <textarea name="output" cols="50" rows="1" id="speechoutput" class="appear"></textarea><br><br><br>
            <button class="submit" onclick="submit()" name="submit">Submit Record</button>
        </form>
    </center>
    <footer>Developed By: Karishma Chhatbar & George Maphole</footer>
    <script src="js/audioConverter.js"></script>
</body>
</html>