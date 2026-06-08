<?php
session_start();
require_once 'includes/functions.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    if (empty($username) || empty($password)) {
        $error = 'يرجى ملء جميع الحقول';
    } else {
        $user = getUserByUsername($username);
        
        if ($user && verifyPassword($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            $_SESSION['admin_role'] = $user['role'];
            header('Location: admin/dashboard.php');
            exit;
        } else {
            $error = 'اسم المستخدم أو كلمة المرور غير صحيحة';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دخول الأدمن</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-container { display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(135deg, #004a99, #2c3e50); }
        .login-box { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 12px 40px rgba(0,0,0,0.2); width: 100%; max-width: 400px; }
        .login-box h1 { text-align: center; color: #004a99; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
        .form-group input { width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 6px; }
        .form-group input:focus { outline: none; border-color: #004a99; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>🔐 دخول الأدمن</h1>
            <?php if ($error): ?><div style="color: #721c24; background: #f8d7da; padding: 12px; border-radius: 6px; margin-bottom: 20px;"><?php echo $error; ?></div><?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label>اسم المستخدم</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" style="width: 100%; padding: 12px; background: #004a99; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">دخول</button>
            </form>
            <div style="text-align: center; margin-top: 20px;">
                <a href="index.php" style="color: #004a99; text-decoration: none;">← العودة إلى الرئيسية</a>
            </div>
        </div>
    </div>
</body>
</html>