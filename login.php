<?php

session_start();

require 'db.php';

$message = "";
$status = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];
            header("Location: welcome.php");
            exit();
        } else {
            $message = "Incorrect password!";
            $status = 2;
        }
    } else {
        $message = "Incorrect username!";
        $status = 2;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="index.php">Labs</a>&nbsp;|&nbsp;Mass Assignment</h2>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="mb-0">' . $message . '</p></div>';
            }
            ?>
	    <div class="p-5 mb-4 bg-light rounded-3">
	    <h2>Login to your account</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3 form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="mb-3 form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            </div>
            <p><a href="register.php">Register here &gt;</a></p>
        </div>
    </main>

    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
</body>

</html>
