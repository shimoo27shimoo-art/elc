<?php
require_once 'db.php';

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

function getNews() {
    global $db;
    $result = $db->query("SELECT * FROM news WHERE is_active = 1 ORDER BY created_at DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getAllNews() {
    global $db;
    $result = $db->query("SELECT * FROM news ORDER BY created_at DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addNews($title, $content, $image_url, $priority) {
    global $db;
    $stmt = $db->prepare("INSERT INTO news (title, content, image_url, priority, is_active) VALUES (?, ?, ?, ?, 1)");
    $stmt->bind_param("ssss", $title, $content, $image_url, $priority);
    return $stmt->execute();
}

function deleteNews($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function getStatistics() {
    global $db;
    $students = $db->query("SELECT COUNT(*) as count FROM students")->fetch_assoc()['count'];
    $teachers = $db->query("SELECT COUNT(*) as count FROM teachers")->fetch_assoc()['count'];
    $news = $db->query("SELECT COUNT(*) as count FROM news")->fetch_assoc()['count'];
    
    return array(
        'students' => $students,
        'teachers' => $teachers,
        'news' => $news
    );
}

function getUserByUsername($username) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}
?>