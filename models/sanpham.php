<?php
class SanPham
{
    public $conn; // Khai báo phương thức 

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // viết hàm lấy toàn bộ danh sách snar phẩm
    public function getallProduct()
    {
        try {
            $sql = 'SELECT * FROM san_phams LIMIT 4';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function getListProduct()
    {
        try {
            $sql = 'SELECT * FROM san_phams';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function ProductWithCategory($danh_muc_id)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = :danh_muc_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':danh_muc_id' => $danh_muc_id,
            ]);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                        FROM san_phams
                        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                        WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function Top5Product()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY luot_xem DESC LIMIT 4';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllSanPham1($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                        FROM san_phams
                        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                        WHERE san_phams.danh_muc_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function checkAcc($user, $pass)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email AND mat_khau = :mat_khau";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'email' => $user,
                'mat_khau' => $pass
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function dangky($email) {
        // Tạo mã xác thực ngẫu nhiên
        $ma_xac_thuc = rand(100000, 999999);
        $chuc_vu_id = 3;
        $mat_khau = 123456;
        // Lưu vào cơ sở dữ liệu
        $sql = "INSERT INTO tai_khoans (email, mat_khau, chuc_vu_id, ma_xac_thuc) VALUES (:email, :mat_khau, :chuc_vu_id,:ma_xac_thuc)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':mat_khau' => $mat_khau,
            ':chuc_vu_id' => $chuc_vu_id,
            ':ma_xac_thuc' => $ma_xac_thuc
        ]);

        return $ma_xac_thuc;
    }

    public function check_ma_xac_thuc($code) {
        // Kiểm tra mã xác thực
        $sql = "SELECT * FROM tai_khoans WHERE ma_xac_thuc = :code";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':code' => $code]);
        $user = $stmt->fetch();

        if ($user) {
            // Cập nhật trạng thái người dùng đã xác thực
            $updateSql = "UPDATE tai_khoans SET so_lan_xac_thuc = 1 WHERE ma_xac_thuc = :code";
            $updateStmt = $this->conn->prepare($updateSql);
            $updateStmt->execute([':code' => $code]);

            return true;
        }

        return false;
    }

    public function ThanhToan($id)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id' => $id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function getAllfavourite($tai_khoan_id) {
        try {
            $sql = 'SELECT san_pham_ua_thichs.*, san_phams.id, san_phams.hinh_anh, san_phams.ten_san_pham , san_phams.gia_khuyen_mai
            FROM san_pham_ua_thichs
            INNER JOIN san_phams ON san_pham_ua_thichs.san_pham_id = san_phams.id
            WHERE san_pham_ua_thichs.tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id
            ]);
            return $stmt->fetchall();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function insertfavourite($san_pham_id, $tai_khoan_id)
    {
        try {
            $sql = 'INSERT INTO san_pham_ua_thichs (san_pham_id, tai_khoan_id)
                VALUES (:san_pham_id, :tai_khoan_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function getAllBinhLuan($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
                        FROM binh_luans
                        INNER JOIN tai_khoans ON binh_luans.tai_khoan_id= tai_khoans.id
                        INNER JOIN san_phams ON binh_luans.san_pham_id= san_phams.id
                        WHERE binh_luans.san_pham_id = :id AND binh_luans.trang_thai = 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung)
    {
        try {
            $sql = 'INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang)
                VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_dang)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => date('Y-m-d H:i:s')
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function buy_product($ma_don_hang, $tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $tong_tien, $ghi_chu, $phuong_thuc_thanh_toan_id)
    {
        try {
            $trang_thai_id = 1;
            $sql = 'INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, phuong_thuc_thanh_toan_id, trang_thai_id)
                        VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ngay_dat, :tong_tien, :ghi_chu, :phuong_thuc_thanh_toan_id, :trang_thai_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_don_hang' => $ma_don_hang,
                ':trang_thai_id' => $trang_thai_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ngay_dat' => date('Y-m-d H:i:s'),
                ':tong_tien' => $tong_tien,
                ':ghi_chu' => $ghi_chu,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
            ]);
            // lấy id sản phẩm vừa thêmm
            $lastInsertId =  $this->conn->lastInsertId();
            // var_dump($lastInsertId);die;
            // return $lastInsertId;
            // viết câu truy vấn đơn hàng
            $sql = 'SELECT * FROM don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $lastInsertId,
            ]);
            $detailDon = $stmt->fetch();
            return [
                'id' => $lastInsertId,
                'detailDon' => $detailDon
            ];
            // return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function addDetailDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $tong_tien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id,don_gia, so_luong,  thanh_tien) 
                           VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong,  :thanh_tien)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':don_gia' => $don_gia,
                ':so_luong' => $so_luong,
                ':thanh_tien' => $tong_tien,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function getDetailDonHang($id)
    {
        try {
            // $sql = 'SELECT * FROM don_hangs WHERE id = :id';
            // Truy vấn SQL để lấy chi tiết đơn hàng
            $sql = 'SELECT don_hangs.*, 
                           trang_thai_don_hangs.ten_trang_thai, 
                           tai_khoans.ho_ten, 
                           tai_khoans.email, 
                           tai_khoans.so_dien_thoai, 
                           phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    WHERE don_hangs.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            // if(($stmt->fetch()) === false ){
            //     var_dump($stmt->errorInfo()); 
            //     die;
            // }else{
            //     echo 'okokok';
            // }
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function getListSPDonHang($tai_khoan_id)
    {
        try {
            $sql = 'SELECT don_hangs.*, chi_tiet_don_hangs.*, san_phams.ten_san_pham , san_phams.hinh_anh, san_phams.gia_san_pham
                FROM don_hangs
                INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                WHERE don_hangs.tai_khoan_id = :tai_khoan_id  ORDER BY don_hangs.id DESC';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getSPDonHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, chi_tiet_don_hangs.*, san_phams.ten_san_pham 
                FROM don_hangs
                INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                WHERE don_hangs.id = :id ';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getAllSearch($keySearch)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :keySearch OR mo_ta LIKE :keySearch";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':keySearch' => '%' . $keySearch . '%',
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'lỗi' . $e;
        }
    }

    public function donhang($tai_khoan_id)
    {
        try {
            $sql = "SELECT don_hangs.*, 
                           trang_thai_don_hangs.ten_trang_thai, 
                           tai_khoans.ho_ten, 
                           tai_khoans.email, 
                           tai_khoans.so_dien_thoai, 
                           phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    WHERE tai_khoan_id = :tai_khoan_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi' . $e;
        }
    }

    public function getAllCart($tai_khoan_id)
    {
        try {
            $sql = 'SELECT gio_hangs.*, chi_tiet_gio_hangs.*, san_phams.id, san_phams.hinh_anh, san_phams.ten_san_pham , san_phams.gia_khuyen_mai
                FROM gio_hangs
                INNER JOIN chi_tiet_gio_hangs ON gio_hangs.id = chi_tiet_gio_hangs.gio_hang_id
                INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                WHERE gio_hangs.tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'lỗi ' . $e;
        }
    }

    public function insertCart($id)
    {
        try {
            $sql = 'INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }

    public function insertDetailCart($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong) 
                           VALUES (:gio_hang_id, :san_pham_id, :so_luong)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // public function deleteCart(){
    //     try {
    //         $sql = 'DELETE '
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }
    // }

    public function getGioHangFromId($id)
    {
        try {
            $sql = 'SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':tai_khoan_id'=>$id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }

    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':gio_hang_id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lõi" . $e->getMessage();
        }
    }


    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            // var_dump($id);die;
            $sql = 'UPDATE chi_tiet_gio_hangs 
                SET
                    so_luong = :so_luong
                WHERE gio_hang_id = :gio_hang_id AND  san_pham_id = :san_pham_id';
            // var_dump($sql);die;

            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;

            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong
            ]);

            // Lấy id đơn hàng vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
}
