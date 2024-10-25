<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost:81/personal_product/');
// dường dẫn đến admin
define('BASE_URL_ADMIN'       , 'http://localhost:81/personal_product/admin/');
// đường dẫn lareval

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'xuong_thu_cung');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
