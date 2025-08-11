<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("Location: Login.php");
}

require_once 'db_connection.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "SELECT * FROM Users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
} else {
    die("No ID provided");
}
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <title>View User</title>
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card text-center" style="width: 30rem;">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="card-body">
                        <?php if (!empty($row['photo'])): ?>
                            <img src="uploads/<?= htmlspecialchars($row['photo']) ?>"
                                 alt="User Photo"
                                 class="rounded-circle mb-3"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        <?php endif; ?>

                        <h5 class="card-title"><?= htmlspecialchars($row['fname'])  . ' ' . htmlspecialchars($row['lname'])  ?> Information!</h5>
                        <p class="card-text">
                            <b>First Name:</b> <?= htmlspecialchars($row['fname'])  ?> <br>
                            <b>Last Name:</b> <?= htmlspecialchars($row['lname'])  ?> <br>
                            <b>Address:</b> <?= htmlspecialchars($row['address'])  ?> <br>
                            <b>Country:</b> <?= htmlspecialchars($row['country'])  ?> <br>
                            <b>Gender:</b> <?= htmlspecialchars($row['gender'])  ?> <br>
                            <b>User Name:</b> <?= htmlspecialchars($row['username'])  ?> <br>
                            <b>Password:</b> <?= htmlspecialchars($row['password'])  ?> <br>
                            <b>Department:</b> <?= htmlspecialchars($row['department'])  ?> <br>
                        </p>
                        <a href="Users.php" class="btn btn-success">Go Back</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
