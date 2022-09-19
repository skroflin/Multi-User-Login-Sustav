<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-user Login System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center 
    align-items-center" style="min-height: 90vh;">
        <form class="border shadow p-3 rounded" action="../check-login/check-login.php" method="POST" style="width: 450px;">
            <h1 class="text-center p-3"> Login</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?=$_GET['error']?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Korisničko ime</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Lozinka</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-1">
                <label class="form-label">Odaberi tip korisnika:</label>
            </div>
            <select class="form-select mb-3" name="roles" aria-label="Default select example">
                <option selected value="user">Korisnici</option>
                <option value="admin">Admin</option>
                <option value="worker">Radnik</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
<?php } else {
    header("Location: ../home/home.php");
} ?>