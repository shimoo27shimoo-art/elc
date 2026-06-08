<?php
session_start();
require_once '../includes/functions.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

$admin_username = $_SESSION['admin_username'];
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    if ($action === 'add_student') {
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $level = isset($_POST['level']) ? trim($_POST['level']) : '';
        
        if ($name && $level) {
            if (addStudent($name, $email, $phone, $level)) {
                $message = 'تم إضافة الطالب بنجاح';
            } else {
                $error = 'حدث خطأ في إضافة الطالب';
            }
        }
    }
}

$students = getStudents();
$stats = getStatistics();
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div style="min-height: 100vh; background: #f5f7fa; padding: 30px;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <h1 style="color: #004a99; margin-bottom: 30px;">🎓 لوحة التحكم</h1>
            
            <?php if ($message): ?>
                <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px;"><?php echo $message; ?></div>
            <?php endif; ?>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <div style="font-size: 36px; font-weight: bold; color: #004a99;"><?php echo $stats['students']; ?></div>
                    <div style="font-size: 16px; color: #7f8c8d; margin-top: 10px;">طالب مسجل</div>
                </div>
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <div style="font-size: 36px; font-weight: bold; color: #004a99;"><?php echo $stats['teachers']; ?></div>
                    <div style="font-size: 16px; color: #7f8c8d; margin-top: 10px;">معلم متخصص</div>
                </div>
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <div style="font-size: 36px; font-weight: bold; color: #004a99;"><?php echo $stats['news']; ?></div>
                    <div style="font-size: 16px; color: #7f8c8d; margin-top: 10px;">خبر وإعلان</div>
                </div>
            </div>
            
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h3 style="color: #004a99; margin-bottom: 20px;">إضافة طالب جديد</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="add_student">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600;">الاسم</label>
                            <input type="text" name="name" required style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 6px;">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600;">المستوى</label>
                            <select name="level" required style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 6px;">
                                <option>مستوى أساسي</option>
                                <option>مستوى متوسط</option>
                                <option>مستوى متقدم</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" style="padding: 12px 24px; background: #004a99; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">إضافة الطالب</button>
                </form>
            </div>
            
            <div style="margin-top: 30px; text-align: center;">
                <a href="logout.php" style="padding: 12px 24px; background: #e74c3c; color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">تسجيل الخروج</a>
            </div>
        </div>
    </div>
</body>
</html>