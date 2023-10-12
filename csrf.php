<?php

session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require 'db.php';
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));  // Generate a new token
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === "jeremy" && $password === "letmein") {
            $message = "You have successfully logged in!";
            $status = 1;
        } else {
            $message = "Your username or password was incorrect!";
            $status = 2;
        }
    } else {
        $message = "Invalid token, please try again.";
        $status = 2;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF Tokens</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="index.php">Labs</a>&nbsp;|&nbsp;CSRF Token</h2>

            <div class="alert alert-warning" role="alert">
                <p class="mb-0">Target account: jeremy</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="mb-0">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="mb-0">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Login</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
