<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Welcome, <?php echo $_SESSION["username"]; ?></h2>

            <p>This is your dashboard</p>
            <p><a href="admin.php">Admin access is here here &gt;</a></p>
        </div>
    </main>

    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
</body>

</html>
