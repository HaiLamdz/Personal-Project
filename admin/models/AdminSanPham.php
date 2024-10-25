<?php 

    class AdminSanPham{
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();
        }
        
        public function getAllSanPham(){
            try {
                $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                        FROM san_phams
                        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
                return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
            }
        }
        

        public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh){
            try {
                $sql = 'INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh)
                           VALUE (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':ten_san_pham' => $ten_san_pham,
                    ':gia_san_pham' => $gia_san_pham,
                    ':gia_khuyen_mai' => $gia_khuyen_mai,
                    ':so_luong' => $so_luong,
                    ':ngay_nhap' => $ngay_nhap,
                    ':danh_muc_id' => $danh_muc_id,
                    ':trang_thai' => $trang_thai,
                    ':mo_ta' => $mo_ta,
                    ':hinh_anh' => $hinh_anh,
                ]);
                // lấy id sản phẩm vừa thêmm
                return $this->conn->lastInsertId();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh){
            try {
                $sql = 'INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh)
                           VALUE (:san_pham_id, :link_hinh_anh)';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':san_pham_id' => $san_pham_id,
                    ':link_hinh_anh' => $link_hinh_anh,
                ]);
                // lấy id sản phẩm vừa thêmm
                return true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        
        public function getDetailSanPham($id){
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
        public function getListAnhSanPham($id){
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
        
        public function getDetailAnhSanPham($id){
            try {
                $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                ]);
                return $stmt->fetch();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        public function updateAlbumAnhSanPham($id, $new_file){
            try {
                $sql = 'UPDATE hinh_anh_san_phams SET link_hinh_anh = :new_file WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                    ':link_hinh_anh' => $new_file
                ]);
                return true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        
        public function destroyAnhSanPham($id){
            try {
                $sql = 'DELETE FROM  hinh_anh_san_phams WHERE san_pham_id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                return true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
                return false;
            }
        }

        public function updateSanPham($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh){
            try {
                if (empty($hinh_anh)) {
                    $sql = 'UPDATE san_phams SET ten_san_pham = :ten_san_pham, gia_san_pham = :gia_san_pham, gia_khuyen_mai = :gia_khuyen_mai, so_luong = :so_luong, ngay_nhap = :ngay_nhap, danh_muc_id = :danh_muc_id, trang_thai = :trang_thai, mo_ta = :mo_ta WHERE id = :id';
                    $params = [
                        ':id' => $id,
                        ':ten_san_pham' => $ten_san_pham,
                        ':gia_san_pham' => $gia_san_pham,
                        ':gia_khuyen_mai' => $gia_khuyen_mai,
                        ':so_luong' => $so_luong,
                        ':ngay_nhap' => $ngay_nhap,
                        ':danh_muc_id' => $danh_muc_id,
                        ':trang_thai' => $trang_thai,
                        ':mo_ta' => $mo_ta
                    ];
                } else {
                    $sql = 'UPDATE san_phams SET ten_san_pham = :ten_san_pham, gia_san_pham = :gia_san_pham, gia_khuyen_mai = :gia_khuyen_mai, so_luong = :so_luong, ngay_nhap = :ngay_nhap, danh_muc_id = :danh_muc_id, trang_thai = :trang_thai, mo_ta = :mo_ta, hinh_anh = :hinh_anh WHERE id = :id';
                    $params = [
                        ':id' => $id,
                        ':ten_san_pham' => $ten_san_pham,
                        ':gia_san_pham' => $gia_san_pham,
                        ':gia_khuyen_mai' => $gia_khuyen_mai,
                        ':so_luong' => $so_luong,
                        ':ngay_nhap' => $ngay_nhap,
                        ':danh_muc_id' => $danh_muc_id,
                        ':trang_thai' => $trang_thai,
                        ':mo_ta' => $mo_ta,
                        ':hinh_anh' => $hinh_anh
                    ];
                }
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($params);
                return true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }

        public function xoaSanPham($id){
            try {
                $sql = 'DELETE FROM  san_phams WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                return true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
                return false;
            }
        }

        // Bình Luận

        public function getBinhLuanOfKhachHang($id){
            try {
                $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham 
                        FROM binh_luans
                        INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                        WHERE binh_luans.tai_khoan_id = :id ';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
                return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
            }
        }
        public function getListBinhLuan($id){
            try {
                $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten
                        FROM binh_luans
                        INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                        WHERE binh_luans.san_pham_id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
                return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
            }
        }

        public function BinhLuan($id){
            try {
                $sql = 'SELECT * FROM binh_luans WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
                return null; // Hoặc xử lý ngoại lệ ở đây, ví dụ: throw $e;
            }
        }

        public function anBinhLuan($id){
            try {
                $sql = 'UPDATE binh_luans SET trang_thai = 2 WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                ]) ;
                return $stmt=true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
    
        public function moBinhLuan($id){
            try {
                $sql = 'UPDATE binh_luans SET trang_thai = 1 WHERE id = :id';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                ]) ;
                return $stmt=true;
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        

    }
?>