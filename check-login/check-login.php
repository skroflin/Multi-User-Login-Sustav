<?php
session_start();
include "../database/db_conn.php";

//echo "Hello!";

if (
    isset($_POST['username']) && isset($_POST['password']) &&
    isset($_POST['roles'])
) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $roles = test_input($_POST['roles']);

    if (empty($username)) {
        header("Location: ../php/index.php?error=Korisničko ime je potrebno");
    } else if (empty($password)) {
        header("Location: ../php/index.php?error=Lozinka je potrebna");
    } else {
        $sql = "SELECT * FROM users WHERE username='$username'
        AND  password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            // korisničko ime mora biti jedinstveno
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password && $row['roles'] === $roles) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['roles'] = $row['roles'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../home/home.php");
            } else {
                header("Location: ../php/index.php?error=Netočno korisničko ime ili lozinka");
            }
        } else {
            header("Location: ../php/index.php?error=Netočno korisničko ime ili lozinka");
        }
    }
} else {
    header("Location: ../php/index.php");
}
