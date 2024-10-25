<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">


</head>

<body>
    <?php
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
    ?>
    <div style=" width: 580px; height: 600px;">
        <div style="width: 500px; margin-left: 40px; margin-top: 40px;" class="login">
            <form action="" method="POST" enctype="multipart/form-data">
                <h2>Đăng Nhập!!</h2>
                <span style="font-size: 20px;">Chào Mừng Bạn Đến Với HaiLam Store!!<i class="fa-solid fa-person-dress-burst"></i></span>
                <br>
                <br>
                <div class="inputBox">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="user" placeholder="Email">
                </div>
                <div class="inputBox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pass" placeholder="Passwork">
                </div>
                <p style="margin-left: 10px;"><a style="color:black;" href="">Quên Mật Khẩu?</a> <br>
                Bạn Chưa Có Tài Khoản?<a style="font-size: large; font-weight: bold;" href="<?= BASE_URL . '?act=signup' ?>">Đăng Ký</a></p>
                <div class="inputBox">
                    <input type="submit" name="login" value="Log In">
                </div>
                <?php if (isset($errors['login'])) {
                ?>
                    <p style="color: red; font-weight: 500; margin-top: 30px;" align="center" class="text-danger"><?= $errors['login']  ?></p>
                <?php
                } ?>
            </form>
            <br>
            <h6 align="center">Hoặc Đăng Nhập Qua</h6>
    
            <br>
            <div class="container">
                <div class="row">
                    <div style="margin-left: 85px;" class="input-group col-8 ">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-square-facebook"></i></span>
                        <input type="text" disabled class="form-control" placeholder="Facebook" >
                        <span style="width: 10px;"></span>
                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-google"></i></span>
                        <input type="text" disabled class="form-control" placeholder="Google" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>