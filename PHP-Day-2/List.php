<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>Users List</title>
</head>
<body class="d-flex justify-content-center align-items-center">
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>Gender</th>
            <th>User_Name</th>
            <th>Password</th>
            <th>Department</th>
            <th>Code</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $file=fopen('Store','r');
        while(!feof($file)){
            echo "<tr>";
            $data=fgets($file);
            $array=explode(',',$data);
            foreach ( $array as $value) {
                echo "<td>".$value."</td>";
            }
        }
        ?>
        </tbody>
    </table>
</body>
<script src="../js/bootstrap.bundle.js"></script>
</html>
