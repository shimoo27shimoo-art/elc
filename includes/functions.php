<?php
require_once 'db.php';

// دوال الطلاب
function getStudents() {
    global $db;
    $result = $db->query("SELECT * FROM students ORDER BY created_at DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getStudentById($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addStudent($name, $email, $phone, $level) {
    global $db;
    $stmt = $db->prepare("INSERT INTO students (name, email, phone, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $level);
    return $stmt->execute();
}

function deleteStudent($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// دوال المعلمين
function getTeachers() {
    global $db;
    $result = $db->query("SELECT * FROM teachers ORDER BY created_at DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getTeacherById($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM teachers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addTeacher($name, $email, $phone, $specialization, $qualifications) {
    global $db;
    $stmt = $db->prepare("INSERT INTO teachers (name, email, phone, specialization, qualifications) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $specialization, $qualifications);
    return $stmt->execute();
}

function deleteTeacher($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM teachers WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// دوال الجداول الدراسية
function getSchedules() {
    global $db;
    $result = $db->query("SELECT s.*, t.name as teacher_name FROM schedules s LEFT JOIN teachers t ON s.teacher_id = t.id ORDER BY s.created_at DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>