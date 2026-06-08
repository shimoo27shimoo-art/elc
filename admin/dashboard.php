<?php
session_start();
require_once '../includes/functions.php';

// التحقق من تسجيل الدخول
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../login.php');
    exit;
}

$admin_username = $_SESSION['admin_username'];
$message = '';
$error = '';

// مع��لجة الإجراءات
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    // إضافة/حذف الطلاب
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
    } elseif ($action === 'delete_student') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id && deleteStudent($id)) {
            $message = 'تم حذف الطالب بنجاح';
        }
    }
    
    // إضافة/حذف المعلمين
    elseif ($action === 'add_teacher') {
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $specialization = isset($_POST['specialization']) ? trim($_POST['specialization']) : '';
        $qualifications = isset($_POST['qualifications']) ? trim($_POST['qualifications']) : '';
        
        if ($name && $specialization) {
            if (addTeacher($name, $email, $phone, $specialization, $qualifications)) {
                $message = 'تم إضافة المعلم بنجاح';
            } else {
                $error = 'حدث خطأ في إضافة المعلم';
            }
        }
    } elseif ($action === 'delete_teacher') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id && deleteTeacher($id)) {
            $message = 'تم حذف المعلم بنجاح';
        }
    }
}

$students = getStudents();
$teachers = getTeachers();
$schedules = getSchedules();
?>