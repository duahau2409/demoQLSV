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
                <span>ADD TEACHER</span>
            </div>
        </div>
        <div class="container">
            <div class="contact-box">
                <div class="right-teacher">
                    <p style='position: absolute; top: -60px; color: red; right: 112px;'>
                        <?php
                        if (isset($_SESSION["thongbao"])) {
                            echo $_SESSION["thongbao"];
                            unset($_SESSION['thongbao']);
                        }
                        ?>
                    </p>
                    <form action="addTeacher.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Teacher Code: </label>
                            <input type="text" name="teacherCode">
                        </div>
                        <div class="form-group">
                            <label for="">Username: </label>
                            <input type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Description: </label>
                            <textarea name="description" rows="5" cols="49" style="resize: none; border: 1px solid #ccc;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Image: </label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group btn">
                            <Button type="submit" name="submit" class="btn-submit">Add Teacher</Button>
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