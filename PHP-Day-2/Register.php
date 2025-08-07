<?php
    $data=implode(',',$_POST);
    file_put_contents('Store',"\n".$data,FILE_APPEND);
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>Register</title>
</head>
<body class="  d-flex justify-content-center align-items-center">
<div class="card p-4 shadow" style="width: 700px;">
    <h5 class="text-center mb-3">Registration</h5>
    <form action="" method="post">
        <div class="mb-3">
            <label name="first name">First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="firstname">
        </div>
        <div class="mb-3">
            <label name="last name">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
        </div>
        <div class="mb-3">
            <label name="address">Address</label>
            <textarea name="address" placeholder="Address"></textarea>
        </div>
        <div class="mb-3">
            <label name="country">Country</label>
            <select class="form-select" aria-label="Select country" name="country">
                <option selected disabled>Open this select menu</option>
                <option value="egypt">Egypt</option>
                <option value="usa">USA</option>
                <option value="germany">Germany</option>
            </select>
        </div>
        <div class="mb-3">
            <label name="gender">Gender</label>
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
            <label name="user name">User Name</label>
            <input type="text" class="form-control" placeholder="User Name" name="username">
        </div>
        <div class="mb-3">
            <label name="Password">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="mb-3">
            <label name="department">Department</label>
            <input type="text" class="form-control" placeholder="Department" name="department">
        </div>
        <div class="mb-3">
            <label name="code">Insert Your Code</label>
            <input type="text" class="form-control" placeholder="Code" name="code">
        </div>
        <div class="row mb-3">
            <button type="submit" class="btn btn-success ">Submit</button>
        </div>
        <div class="row mb-3">
            <button type="reset" class="btn btn-success ">Reset</button>
        </div>
    </form>
</div>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
