<?php
class User
{
    public $conn; // Khai báo phương thức 

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllUser($id) {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function updateUser($id, $ho_ten, $gioi_tinh, $ngay_sinh, $so_dien_thoai, $anh_dai_dien){
        try {
            $sql = 'UPDATE tai_khoans SET ho_ten = :ho_ten, gioi_tinh = :gioi_tinh, ngay_sinh = :ngay_sinh, so_dien_thoai = :so_dien_thoai, anh_dai_dien = :anh_dai_dien WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ho_ten' => $ho_ten,
                ':gioi_tinh' => $gioi_tinh,
                ':ngay_sinh' => $ngay_sinh,
                ':so_dien_thoai' => $so_dien_thoai,
                ':anh_dai_dien' => $anh_dai_dien,
            ]);
            return $stmt;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }



}