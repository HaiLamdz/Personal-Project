<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Thực Tài Khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <?php
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
    ?>
    <div style="width: 500px;" class="login">
        <form  action="?act=verify" method="POST">
            <h2>Xác Thực Tài Khoản</h2>
            <span style="font-size: 20px;">Vui Lòng Nhập Mã Xác Thực Đã Gửi Qua Email</span>
            <br><br>

            <div class="inputBox">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" placeholder="Email" value="<?= $_POST['email'] ?? '' ?>" readonly>
            </div>
            <div class="inputBox">
                <i class="fa-solid fa-key"></i>
                <input type="text" name="verification_code" placeholder="Mã Xác Thực" required>
            </div>
            <?php if (isset($errors['verification_code'])) { ?>
                <p style="color: red; font-weight: 500;" align="center" class="text-danger"><?= $errors['verification_code']  ?></p>
            <?php } ?>

            <div class="inputBox">
                <input type="submit" name="verify" value="Xác Thực">
            </div>

            <p>Chưa nhận được mã? <a style="font-size: large; font-weight: bold; text-decoration: none;" href="#">Gửi lại mã</a></p>
        </form>
    </div>
</body>

</html>
