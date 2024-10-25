

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ với chúng tôi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        h2 {
            color: #28a745;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .contact-info {
            margin-top: 30px;
        }

        .contact-info p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
<?php require_once './views/layout/header.php'; ?>
<?php require_once './views/layout/nav.php'; ?>
    <div class="container">
        <h1>Liên hệ với chúng tôi</h1>

        <div class="contact-info">
            <h2>HaiLam Store</h2>
            <p><strong>Địa chỉ:</strong>Cầu Giấy, Hà Nội </p>
            <p><strong>Điện thoại:</strong> 0123-456-789</p>
            <p><strong>Email:</strong> hailamstore@gmail.com</p>
            <p><strong>Giờ làm việc:</strong> Thứ Hai - Thứ Sáu: 8:00 - 17:00</p>
        </div>

        <h2>ĐĂNG KÝ NHẬN TIN</h2>
        <p>Hãy là người đầu tiên nhận khuyến mãi lớn!!</p>
        <form action="" method="post">
            <input type="email" id="email" name="email" required placeholder="Nhập email của bạn..">
            <textarea id="message" name="message" required placeholder="Nếu có yêu cầu hay thắc mắc gì hãy nhập ở đây"></textarea>
            <button style="margin-left: 70%;" type="submit" class="btn col-3">Gửi</button>
        </form>
    </div>
    <?php require_once './views/layout/footer.php'; ?>
</body>

</html>
