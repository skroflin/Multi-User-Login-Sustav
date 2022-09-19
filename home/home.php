<?php
session_start();
include "../database/db_conn.php";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>

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
            <!--<h1>Pozdrav</h1>-->
            <?php
            if ($_SESSION['roles'] == 'admin') { ?>
                <!-- Za admina -->
                <div class="card" style="width: 18rem;">
                    <img src="../img/admin-default.png" class="card-img-top" alt="admin image">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $_SESSION['name'] ?></h5>
                        <a href="../logout/logout.php" class="btn btn-dark">Logout</a>
                    </div>
                </div>
                <div class="class-p4">
                    <?php include '../members/members.php';
                        if(mysqli_num_rows($res) > 0){?>
                    <h1 class="display-4 fs-1">Članovi</h1>
                    <table class="table" style="width: 32rem;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ime</th>
                                <th scope="col">Korisničko ime</th>
                                <th scope="col">Rola</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                                while($rows = mysqli_fetch_assoc($res)){?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td><?=$rows['name']?></td>
                                <td><?=$rows['username']?></td>
                                <td><?=$rows['roles']?></td>
                            </tr>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                    <?php }?>
                </div>
            <?php }else{ ?>
                <!--ZA RADNIKA-->
                <div class="card" style="width: 18rem;">
                    <img src="../img/user-default.png" class="card-img-top" alt="admin image">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $_SESSION['name'] ?></h5>
                        <a href="../logout/logout.php" class="btn btn-dark">Logout</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: ../php/index.php");
} ?>