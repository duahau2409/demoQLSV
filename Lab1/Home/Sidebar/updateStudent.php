<?php
session_start();
include '../../config.php';

$id = '';
$sudentCode = '';
$username = '';
$class = '';
$email = '';

$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:viewStudent.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:viewStudent.php");
        exit;
    }
    $id = $row['id'];
    $sudentCode = $row['sudentCode'];
    $username = $row['username'];
    $class = $row['class'];
    $email = $row['email'];
} else {
    $id = $_POST['id'];
    $sudentCode = $_POST['sudentCode'];
    $username = $_POST['username'];
    $class = $_POST['class'];
    $email = $_POST['email'];

    // do {
    if (empty($sudentCode) || empty($username) || empty($class) || empty($email)) {
        $errorMessage = 'All the fields are required';
        // break;
    }
    $sql2 = "UPDATE students SET sudentCode = '" . $sudentCode . "', username ='" . $username . "', class = '" . $class . "', email = '" . $email . "' WHERE id='" . $id . "'";
    $result2 = mysqli_query($conn, $sql2);

    if (!$result2) {
        $errorMessage = 'Invalid query: ' . $conn->error;
        // break;
    }
    $successMessage = 'Student Update correctly';
    header("location:viewStudent.php");
    // } while (true);
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
                <div class="right-updateS">
                    <?php
                    if (!empty($errorMessage)) {
                        echo "
                    <p style='position: absolute; top: -60px; color: red; right: 112px;'>$errorMessage</p>
                    ";
                    }
                    ?>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="">sudentCode: </label>
                            <input type="text" name="sudentCode" value="<?php echo $sudentCode; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Username: </label>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Class: </label>
                            <input type="text" name="class" value="<?php echo $class; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group btn">
                            <Button type="submit" name="update" value="update" class="btn-submit">UPDATE STUDENT</Button>
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