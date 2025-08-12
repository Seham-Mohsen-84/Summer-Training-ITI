<?php
session_start();

require_once 'db_connection.php';
$DB= new Database();

if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("Location: Login.php");
}

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
                    <th colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result = $DB->SelectAll("users");
                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["fname"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["lname"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["country"])  . "</td>";
                        echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["password"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["department"]) . "</td>";
                        echo "<td> <a href='View.php?id={$row['id']}' class='btn btn-primary'>View</a> </td>";
                        echo "<td> <a href='Edit.php?id={$row['id']}' class='btn btn-warning'>Edit</a> </td>";
                        echo "<td> <a href='Delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a> </td>";
                        echo "</tr>";
                    }
                }?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center gap-3">
                <a href="Register.php" class="btn btn-outline-success flex-fill text-center">Add</a>
                <a href="Logout.php" class="btn btn-outline-dark flex-fill text-center">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
