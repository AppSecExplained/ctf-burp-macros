<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macros Lab</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <div class="row border-bottom pb-2">
                <div class="col">
                    <h2>Macros are your friend</h2>
                </div>
                <div class="col text-end">
                    <a href="/capstone/index.php" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>

            <?php if ($successMessage) { ?>
            <div class="alert alert-success" role="alert">
                <p><?php echo $successMessage; ?></p>
            </div>
            <?php } ?>
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" id="card1">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">CSRF Tokens</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center me-3">
                                    <a href='csrf.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card2">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Mass Assignment</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center me-3">
                                    <a href='register.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card3" style="background-image: url('logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">MFA Challenge</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center me-3">
                                    <a href='mfa.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="small text-center">Don't forget to take regular breaks, you got this :)</p>
            <p class="small text-center">Built by <a href="https://www.linkedin.com/in/alex-olsen-ase/">Alex</a> - Feel free to connect!</p>
        </div>
        <!-- instructions modal -->
        <div class="modal" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instructionsModalLabel">Instructions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2>Where to begin</h2>
                        <p>Check the blog post or videos linked from the repository.</p>
                        <p>If you need to reset the DB, visit /init.php</p>
                        <p>There isn't any official support for this app but reach out on Discord if you're stuck and need some help, and we'll do our best!</p>
                        <p>Feel free to follow or connect on <a href="https://www.linkedin.com/in/alex-olsen-ase/">LinkedIn</a> and <a href="https://twitter.com/appSecExp">Twitter</a>.</p>
                        <hr>
                        <p>Good luck!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>

</body>

</html>
