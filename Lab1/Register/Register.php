<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <h3>Sign Up</h3>
    <form action="RegisterSubmit.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>RePassword: </td>
                <td><input type="password" name="repassword"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <Button type="submit" name="submit">Sign Up</Button>
                    <Button type="reset">Reset</Button>
                </td>
            </tr>
        </table>
    </form> -->
    <div class="wrapper">
        <div class="form-box login">
            <h3 class="flexJACenter">Sign Up</h3>
            <p>
                <?php
                if (isset($_SESSION["thongbao"])) {
                    echo $_SESSION["thongbao"];
                    unset($_SESSION['thongbao']);
                }
                ?>
            </p>
            <form action="RegisterSubmit.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" name="username" placeholder=" " class="form-input">
                    <label class="form-label">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" class="form-input" placeholder=" ">
                    <label class="form-label">Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="repassword" class="form-input" placeholder=" ">
                    <label class="form-label">RePassword</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" class="form-input" placeholder=" ">
                    <label class="form-label">Email</label>
                </div>
                <Button type="submit" name="submit" class="btn-submit">Log In</Button>
            </form>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>

</body>

</html>