<?php
define('DB_HOST', 'sql306.infinityfree.com');
define('DB_USER', 'if0_42134011');
define('DB_PASS', 'Your_vPanel_Password');
define('DB_NAME', 'if0_42134011_db');

define('SITE_NAME', 'المجمع التعليمي للغات بالإسماعيلية');
define('SITE_URL', 'http://your-domain.com/');
define('ADMIN_EMAIL', 'admin@ismailia.edu');

define('SESSION_TIMEOUT', 3600);
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOCKOUT_TIME', 900);

define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 5242880);
define('ALLOWED_EXTENSIONS', array('jpg', 'jpeg', 'png', 'gif', 'pdf'));

if (APP_ENV === 'development') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(E_ALL);
}

date_default_timezone_set('Africa/Cairo');
?>