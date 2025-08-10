<?php
 require_once 'db_connection.php';
 $sql = "SELECT * FROM `users`";
 $result = $conn->query($sql);
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <title>All Users</title>
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <table class="table table-striped table-hover">
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
                    <th colspan="4">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["fname"] . "</td>";
                        echo "<td>" . $row["lname"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["country"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["department"] . "</td>";
                        echo "<td> <a href='Register.php' class='btn btn-success'>Add</a> </td>";
                        echo "<td> <a href='View.php?id={$row['id']}' class='btn btn-primary'>View</a> </td>";
                        echo "<td> <a href='Edit.php?id={$row['id']}' class='btn btn-warning'>Edit</a> </td>";
                        echo "<td> <a href='Delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a> </td>";
                        echo "</tr>";
                    }
                }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
