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

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        // $username = mysqli_real_escape_string($connect, $_POST['username']);
        // $password = md5($_POST['password']);
        
        $result = mysqli_query($connect, "SELECT `id`, `username`, `fullname` FROM `user` WHERE `username`='" . $_POST['username'] . "' AND `password` = md5('" . $_POST['password'] . "')");
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['current_user'] = $row;            
            
            $currentUser = $_SESSION['current_user'];
            echo '<div id="login-notify" class="box-content">
                    Xin chào ' . $currentUser['fullname'] . '<br/>
                    <a href="./edit.php">Đổi mật khẩu</a><br/>
                    <a href="./logout.php">Đăng xuất</a>
                  </div>';
        } else {
            echo '<div id="edit-notify" class="box-content">
                    <h1>Đăng Nhập Thất Bại</h1>
                  </div>';
        }
    } else {
        echo '<div id="user_login" class="box-content">
                <h1>Đăng nhập tài khoản</h1>
                <form action="./dangnhap.php" method="POST" autocomplete="off">
                    <label>Tài Khoản</label><br/>
                    <input type="text" name="username" value="" /><br/>
                    <label>Password</label><br/>
                    <input type="password" name="password" value="" /><br/>
                    <br/>
                    <input type="submit" value="Đăng nhập" />
                </form>
              </div>';
    }
    ?>
</body>
</html>