<?php
require_once 'db_connection.php';

$id = $_GET["id"]??null;

if ($id != null) {
    $sql = "SELECT * FROM `Users` WHERE `id` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = $_POST['firstname'] ?? "";
    $lname = $_POST['lastname'] ?? "";
    $address = $_POST['address'] ?? "";
    $country = $_POST['country'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
    $department = $_POST['department'] ?? "";

    $sql = "UPDATE Users 
            SET fname = ?, lname = ?, address = ?, country = ?, gender = ?, username = ?, password = ?, department = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$fname, $lname, $address, $country, $gender, $username, $password, $department, $id]);

    if ($result) {
        header("Location: Users.php");
        exit;
    } else {
        echo "Error updating record.";
    }
}

?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <title>Edit</title>
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <?php while ($row = $stmt->fetch()) : ?>
            <div class="card p-4 shadow">
                <h5 class="text-center mb-3">Edit User</h5>
                <form action="" method="post">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $row['fname']?>">
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $row['lname']?>">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Address"><?php echo $row['address']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Country</label>
                        <select class="form-select" name="country">
                            <option selected ><?php echo $row['country']?></option>
                            <option value="egypt">Egypt</option>
                            <option value="usa">USA</option>
                            <option value="germany">Germany</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                <?php if ($row['gender'] === 'male') echo 'checked'; ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                <?php if ($row['gender'] === 'female') echo 'checked'; ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $row['username']?>">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $row['password']?>">
                    </div>
                    <div class="mb-3">
                        <label>Department</label>
                        <input type="text" class="form-control" placeholder="Department" name="department" value="<?php echo $row['department']?>">
                    </div>
                    <div class="mb-3">
                        <label>Insert Your Code</label>
                        <input type="text" class="form-control" placeholder="Code" name="code">
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    <div class="row mb-3">
                        <a href="Users.php" class="btn btn-primary">Users</a>
                    </div>
                    <div class="row mb-3">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
