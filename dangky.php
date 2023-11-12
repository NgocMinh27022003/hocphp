<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     include './connect_db.php';
     echo '<div id="user_register" class="box-content">
        <h1>Đăng ký tài khoản</h1>
        <form action="./dangky.php?action=reg" method="Post" autocomplete="off">
            <label>Nhập Tài Khoản</label><br/>
            <input type="text" name="username" value=""><br/>
            <label>Password</label><br/>
            <input type="password" name="password" value="" /><br/>
            <label>Họ tên</label><br/>
            <input type="text" name="fullname" value="" /><br/>
            <input type="submit" value="Đăng ký"/>
        </fom>          
';

if (isset($_GET['action']) && $_GET['action'] == 'reg') {
    if (isset($_POST['username'], $_POST['password'], $_POST['fullname'])) {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);

        $query = "INSERT INTO user (username, password, fullname) 
                  VALUES ('$username',MD5('" . $_POST['password'] . "'), '$fullname');";

        try {
            mysqli_query($connect, $query);
            echo '<div id="edit-notify" class="box-content">
                <h1>Đăng ký tài khoản thành công</h1>
                <a href="./dangnhap.php">Mời bạn đăng nhập</a>
            </div>';
        } catch (Exception $ex) {
            echo "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
            echo '<a href="./dangky.php"> Quay về trang đăng ký</a>';
        }

        mysqli_close($connect);
    } else {
        $error = "Bạn chưa nhập đủ thông tin";
    }
}
?>

</body>
</html>