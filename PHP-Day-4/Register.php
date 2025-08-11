<?php
require_once 'db_connection.php';

$result = false;
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['firstname'] ?? "";
    $lname = $_POST['lastname'] ?? "";
    $address = $_POST['address'] ?? "";
    $country = $_POST['country'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
    $department = $_POST['department'] ?? "";

    
    $photoName = "";
    if (!empty($_FILES['photo']['name'])) {
        $uploadDir = "uploads/"; 
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $photoName = time() . "_" . basename($_FILES['photo']['name']);
        $targetPath = $uploadDir . $photoName;

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
            $errorMsg = "Error uploading photo.";
        }
    }

    $sql = "INSERT INTO Users (fname,lname,address,country,gender,username,password,department,photo) 
            VALUES(?,?,?,?,?,?,?,?,?)";

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            $fname, $lname, $address, $country, $gender, $username, $password, $department, $photoName
        ]);

        if ($result) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit;
        }
    } catch (PDOException $e) {
        $errorMsg = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div class="alert alert-success mb-4" role="alert">
                    New record created successfully
                </div>
            <?php elseif (!empty($errorMsg)): ?>
                <div class="alert alert-danger mb-4" role="alert">
                    Error: <?= htmlspecialchars($errorMsg) ?>
                </div>
            <?php endif; ?>

            <div class="card p-4 shadow">
                <h5 class="text-center mb-3">Registration</h5>
                <form action="" method="post" enctype="multipart/form-data" class="was-validated">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Country</label>
                        <select class="form-select" name="country" required>
                            <option selected disabled>Open this select menu</option>
                            <option value="egypt">Egypt</option>
                            <option value="usa">USA</option>
                            <option value="germany">Germany</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label>Department</label>
                        <input type="text" class="form-control" placeholder="Department" name="department" required>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Upload Photo</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="photo" required>
                    </div>
                    <div class="mb-3">
                        <label>Insert Your Code</label>
                        <input type="text" class="form-control" placeholder="Code" name="code">
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="row mb-3">
                        <a href="Users.php" class="btn btn-primary">Users</a>
                    </div>
                    <div class="row mb-3">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
