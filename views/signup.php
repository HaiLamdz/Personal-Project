<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <?php
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
    ?>
    <div style="width: 500px; " class="login">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Đăng Ký!!</h2>
            <span style="font-size: 20px;">Chào Mừng Bạn Đến Với HaiLam Store</span>
            <br>
            <br>
            
            <div class="inputBox">
            <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" placeholder="Email">
            </div>
            
            Bạn Đã Có Tài Khoản?<a style="font-size: large; font-weight: bold; text-decoration: none;" href="<?= BASE_URL . '?act=login' ?>">Đăng Nhập</a></p>
            <div class="inputBox">
                <input type="submit" name="signup" value="Đăng ký">
            </div>
        </form>
        <br>
    </div>
</body>

</html>