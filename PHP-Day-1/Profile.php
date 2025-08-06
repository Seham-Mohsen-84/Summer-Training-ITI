<?php
$firstname = $_POST['firstname']??'';
$lastname = $_POST['lastname']??'';
$address = $_POST['address']??'';
$country = $_POST['country']??'';
$gender = $_POST['gender']??'';
$username = $_POST['username']??'';
$password = $_POST['password']??'';
$department = $_POST['department']??'';
$code = $_POST['code']??'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>Profile2</title>
</head>
<body class=" vh-100 d-flex justify-content-center align-items-center">

<div class="card text-center" style="width: 30rem;">
    <div class="card-body">
        <h2>Thank You</h2>
        <h5 class="card-title"><?php  echo '" '.($firstname).' "' ." Information!"?></h5>
        <p class="card-text">
            <b>First Name:</b> <?php echo ($firstname); ?><br>
            <b>Last Name:</b> <?php echo ($lastname); ?><br>
            <b>Address:</b> <?php echo ($address); ?><br>
            <b>Country:</b> <?php echo ($country); ?><br>
            <b>Gender:</b> <?php echo ($gender); ?><br>
            <b>User Name:</b> <?php echo ($username); ?><br>
            <b>Password:</b> <?php echo ($password); ?><br>
            <b>Department:</b> <?php echo ($department); ?><br>
        </p>
        <a href="Register.php" class="btn btn-success">Go Back</a>
    </div>
</div>

<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
