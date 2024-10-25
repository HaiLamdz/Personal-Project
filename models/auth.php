<?php
class UserModel {
    public $conn;

    public function createUser($email) {
        // Tạo mã xác thực ngẫu nhiên
        $verificationCode = rand(100000, 999999);

        // Lưu vào cơ sở dữ liệu
        $sql = "INSERT INTO tai_khoans (email, verification_code) VALUES (:email, :verification_code)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':verification_code' => $verificationCode
        ]);

        return $verificationCode;
    }

    public function verifyUser($code) {
        // Kiểm tra mã xác thực
        $sql = "SELECT * FROM users WHERE verification_code = :code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':code' => $code]);
        $user = $stmt->fetch();

        if ($user) {
            // Cập nhật trạng thái người dùng đã xác thực
            $updateSql = "UPDATE users SET is_verified = 1 WHERE verification_code = :code";
            $updateStmt = $this->conn->prepare($updateSql);
            $updateStmt->execute([':code' => $code]);

            return true;
        }

        return false;
    }
}
