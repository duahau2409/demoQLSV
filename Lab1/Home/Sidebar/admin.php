<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:../LogIn/LogIn.php");
}

$conn = mysqli_connect("localhost", "root", "", "Lab1");
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylecenter.css">
</head>

<body>
    <?php
    include '../adminSidebar.php';
    ?>
    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>ADMINISTRATOR</span>
            </div>
        </div>
        <div class="center-wrapper">
            <table class="boderTB">
                <thead>
                    <tr>
                        <th class="pding20f15">Name</th>
                        <th class="pding20f15">Position</th>
                    </tr>
                </thead>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <th class="pding20f15">
                                <?php echo "{$info['username']}" ?>
                            </th>
                            <th class="pding20f15">Administrator</th>
                        </tr>
                    </tbody>

                <?php
                }
                ?>

            </table>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>