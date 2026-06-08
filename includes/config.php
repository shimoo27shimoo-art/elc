<?php
// إعدادات قاعدة البيانات
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'elc_db');

// إعدادات الموقع
define('SITE_NAME', 'المجمع التعليمي للغات بالإسماعيلية');
define('SITE_URL', 'http://localhost/elc/');

// إعدادات الجلسة
session_set_cookie_params([
    'lifetime' => 86400,
    'path' => '/',
    'domain' => '',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict'
]);
?>