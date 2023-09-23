<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleSubmitOrUpdate.css">
</head>

<body>
    <?php
    include '../adminSidebar.php';
    ?>
    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>ADD STUDENT</span>
            </div>
        </div>
        <div class="container">
            <div class="contact-box">
                <div class="right">
                    <div>
                        <p style='position: absolute; top: -60px; color: red; right: 112px;'>
                            <?php
                            if (isset($_SESSION["thongbao"])) {
                                echo $_SESSION["thongbao"];
                                unset($_SESSION['thongbao']);
                            }
                            ?>
                        </p>
                    </div>
                    <form action="addStudent.php" method="POST">
                        <div class="form-group">
                            <label for="">Student Code: </label>
                            <input type="text" name="sudentCode">
                        </div>
                        <div class="form-group">
                            <label for="">Username: </label>
                            <input type="text" name="username">
                        </div>
                        <div class="form-group">
                            <label for="">Class: </label>
                            <input type="text" name="class">
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" name="email">
                        </div>
                        <div class="form-group btn">
                            <Button type="submit" name="submit" class="btn-submit">Add Student</Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>