<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
</head>

<body>
    <?php require_once './views/layout/header.php' ?>
    <?php require_once './views/layout/nav.php' ?>
    <div class="container mt-5">
        <div class="row">
            <?php require_once 'sidebar.php' ?>
            <div class="col-9 max-w-4xl mx-auto p-4 ">
                <div class="col-12 bg-white rounded shadow p-4" style="min-height: auto;">
                    <h4>Hồ Sơ Của Tôi</h4>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    <form method="POST" action="<?= BASE_URL . '?act=update_Account' ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Tên -->
                                <div class="form-group mb-3">
                                    <label for="name">Tên Đăng Nhập</label>
                                    <input type="text" class="form-control" name="ho_ten" id="name" placeholder="<?= $Account['ho_ten'] ?? 'Nhập tên của bạn' ?>">
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $Account['email'] ?>" disabled>
                                </div>

                                <!-- Số điện thoại -->
                                <div class="form-group mb-3">
                                    <label for="phone">Số điện thoại</label>
                                    <?php if ($Account['so_dien_thoai']) { ?>
                                        <input type="text" class="form-control" name="so_dien_thoai" id="phone" value="<?= $Account['so_dien_thoai'] ?>" disabled>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" name="so_dien_thoai" id="phone" placeholder="Nhập số điện thoại">
                                    <?php } ?>
                                </div>

                                <!-- Giới tính -->
                                <div class="form-group mb-3">
                                    <label>Giới tính</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" <?= $Account['gioi_tinh'] == 1 ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ" <?= $Account['gioi_tinh'] == 2 ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="female">Nữ</label>
                                    </div>
                                </div>

                                <!-- Ngày sinh -->
                                <div class="form-group mb-3">
                                    <label for="birthday">Ngày sinh</label>
                                    <div class="row">
                                        <div class="col">
                                            <select id="day" name="day" class="form-control">
                                                <?php for ($i = 1; $i <= 31; $i++): ?>
                                                    <option value="<?= $i ?>" <?= $day == $i ? 'selected' : '' ?>><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select id="month" name="month" class="form-control">
                                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                                    <option value="<?= $i ?>" <?= $month == $i ? 'selected' : '' ?>><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select id="year" name="year" class="form-control">
                                                <?php for ($i = date('Y'); $i >= 1900; $i--): ?>
                                                    <option value="<?= $i ?>" <?= $year == $i ? 'selected' : '' ?>><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <p id="dateDisplay"></p>
                                </div>
                            </div>

                            <!-- Hình đại diện -->
                            <div class="col-md-4 text-center">
                                <label for="anh_dai_dien">Ảnh đại diện</label><br>
                                <img id="img" src="<?= $Account['anh_dai_dien'] ?? 'https://via.placeholder.com/150' ?>" alt="anh_dai_dien" class="img-fluid rounded-circle mb-3" style="width: 200px;">
                                <input type="file" class="form-control" id="input" name="anh_dai_dien">
                                <p class="mt-2">Dung lượng file tối đa 1 MB<br>Định dạng: JPEG, PNG</p>
                            </div>
                        </div>

                        <!-- Nút Lưu -->
                        <div class="form-group text-center mt-4">
                            <button style="background-color: grey; width: 120px; border-radius: 10px; margin-left: 30px;" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once './views/layout/footer.php' ?>
</body>
<script>
    const img = document.querySelector('#img');
    const input = document.querySelector('#input');

    input.addEventListener("change", () => {
        img.src = URL.createObjectURL(input.files[0])
    })
</script>

</html>