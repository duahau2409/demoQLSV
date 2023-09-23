<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "Lab1");
$sql = "SELECT * FROM teachers";
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
                <span>VIEW TEACHER</span>
            </div>
        </div>

        <div class="center-wrapper">
            <table class="boderTB">
                <thead>
                    <tr>
                        <th class="pding20f15">Avatar</th>
                        <th class="pding20f15">Teacher Code</th>
                        <th class="pding20f15">Name</th>
                        <th class="pding20f15">Description</th>
                        <th class="pding20f15">Delete</th>
                        <th class="pding20f15">Update</th>
                    </tr>
                </thead>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <th class="pding20f15">
                                <img src="<?php echo "../{$info['image']}" ?>" height="100px" width="100px">
                                <!-- <img src="../Image/paris.png" alt="" srcset=""> -->
                            </th>
                            <th class="pding20f15">
                                <?php echo "{$info['teacherCode']}" ?>
                            </th>
                            <th class="pding20f15">
                                <?php echo "{$info['name']}" ?>
                            </th>
                            <th class="pding20f15">
                                <?php echo "{$info['description']}" ?>
                            </th>
                            <th class="pding20f15">
                                <?php echo "<a href='deleteT.php?id={$info['id']}' class='delete'><ion-icon name='trash-outline'></ion-icon></a>"; ?>
                            </th>
                            <th class="pding20f15">
                                <?php echo "<a href='updateTeacher.php?id={$info['id']}' class='update'><ion-icon name='settings-outline'></ion-icon></a>"; ?>
                            </th>
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