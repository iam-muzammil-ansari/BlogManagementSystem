<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Log In</title>
</head>

<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="class-body">
                    <main class="form-signin mt-5 justify-content-center">
                        <form class="form-signin" action="<?= base_url() . 'admin/login/login_post' ?>" method="post">
                            <?php
                            if ($error != "NO_ERROR") {
                                echo "<div class='alert alert-danger' role='alert'>$error</div>";
                            }
                            ?>

                            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                            <div class="form-group">
                                <label for="inputEmail">Username</label>
                                <input type="text" name="username" class="form-control" id="inputEmail" placeholder="Username" value="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password" value="" autocomplete="off">
                            </div>
                            <div class="checkbox my-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                            <p class="mt-5 mb-3 text-body-secondary">© 2017-2023</p>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    -->
</body>

</html>