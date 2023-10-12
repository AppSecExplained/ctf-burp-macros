<?php

session_start();

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"] ?? 'user';

    $checkStmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $message = "Username already exists!";
        $status = 2;
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $role);
        if ($stmt->execute()) {
            $message = "Registration successful!";
            $status = 1;
        } else {
            $message = "Error: " . $stmt->error;
            $status = 2;
        }
        $stmt->close();
    }

    $checkStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass Assignment</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="index.php">Labs</a>&nbsp;|&nbsp;Mass Assignment</h2>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="mb-0">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="mb-0">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Register a new account</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
            <p><a href="login.php">Login here &gt;</a></p>
        </div>
    </main>
	<script src="../assets/popper.min.js"></script>
	<script src="../assets/bootstrap.min.js"></script>
	
</body>
</html>
