<?php
session_start();
include '../../config.php';

$id = '';
$teacherCode = '';
$name = '';
$description = '';
$image = '';

$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:viewTeacher.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM teachers WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:viewTeacher.php");
        exit;
    }
    $id = $row['id'];
    $teacherCode = $row['teacherCode'];
    $name = $row['name'];
    $description = $row['description'];
} else {
    $id = $_POST['id'];
    $teacherCode = $_POST['teacherCode'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $dst = '../Image' . $image;
    $dst_db = 'Image/' . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    if (empty($teacherCode) || empty($name) || empty($description) || empty($image)) {
        $errorMessage = 'All the fields are required';
    }
    $sql2 = "UPDATE teachers SET teacherCode = '$teacherCode', name ='$name', description = '$description', image = '$dst_db' WHERE id='$id' ";
    $result2 = mysqli_query($conn, $sql2);

    if (!$result2) {
        $errorMessage = 'Invalid query: ' . $conn->error;
    }
    $successMessage = 'Teacher Update correctly';
    header("location:viewTeacher.php");
}
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
                <span>UPDATE STUDENT</span>
            </div>
        </div>
        <div class="container">
            <div class="contact-box">
                <div class="right-updateT">
                    <?php
                    if (!empty($errorMessage)) {
                        echo "
                    <p style='position: absolute; top: -60px; color: red; right: 112px;'>$errorMessage</p>
                    ";
                    }
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="">Avatar: </label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">teacherCode: </label>
                            <input type="text" name="teacherCode" value="<?php echo $teacherCode; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">name: </label>
                            <input type="text" name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">description: </label>
                            <textarea name="description" rows="6" cols="52" style="resize: none;"> <?php echo $description; ?> </textarea>
                        </div>
                        <div class="form-group btn">
                            <Button type="submit" name="update" value="update" class="btn-submit">UPDATE TEACHER</Button>
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