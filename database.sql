-- قاعدة البيانات للمجمع التعليمي للغات بالإسماعيلية

-- جدول المستخدمين (الأدمن)
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `email` varchar(100),
  `role` enum('admin','superadmin') DEFAULT 'admin',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول الطلاب
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100),
  `phone` varchar(20),
  `level` varchar(100) NOT NULL,
  `enrollment_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول المعلمين
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100),
  `phone` varchar(20),
  `specialization` varchar(255) NOT NULL,
  `qualifications` text,
  `hire_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول الجداول الدراسية
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `classroom` varchar(100) NOT NULL,
  `day_of_week` varchar(50) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`teacher_id`) REFERENCES `teachers`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول الأخبار
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image_url` varchar(500),
  `priority` enum('عاجل','مهم','عام') DEFAULT 'عام',
  `is_active` int(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول الإعلانات
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `priority` enum('عاجل','مهم','عام') DEFAULT 'عام',
  `is_active` int(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول معرض الصور
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image_url` varchar(500) NOT NULL,
  `category` varchar(100),
  `display_order` int(11) DEFAULT 0,
  `is_active` int(1) DEFAULT 1,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول مساحات الإعلانات
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image_url` varchar(500) NOT NULL,
  `link` varchar(500),
  `position` varchar(100) NOT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` int(1) DEFAULT 1,
  `start_date` timestamp NULL,
  `end_date` timestamp NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول شريط الأخبار المتحرك
CREATE TABLE IF NOT EXISTS `news_ticker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `is_active` int(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- إدراج بيانات تجريبية - مستخدم أدمن
INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES 
('admin', '$2y$10$YIjlrBxvgQvB5ZeUVP8H.eYzF8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z', 'admin@ismailia.edu', 'admin');

-- إدراج بيانات تجريبية - طلاب
INSERT INTO `students` (`name`, `level`, `email`, `phone`) VALUES 
('أحمد محمد علي', 'مستوى متقدم', 'ahmed@example.com', '01001234567'),
('فاطمة السيد حسن', 'مستوى متوسط', 'fatima@example.com', '01101234567'),
('محمود عبدالله سالم', 'مستوى أساسي', 'mahmoud@example.com', '01201234567');

-- إدراج بيانات تجريبية - معلمين
INSERT INTO `teachers` (`name`, `specialization`, `email`, `phone`, `qualifications`) VALUES 
('د. سارة محمود', 'اللغة الإنجليزية', 'sarah@ismailia.edu', '01001111111', 'ماجستير في اللغة الإنجليزية'),
('أ. علي حسن', 'اللغة الفرنسية', 'ali@ismailia.edu', '01001111112', 'بكالوريوس في اللغة الفرنسية'),
('أ. نور أحمد', 'اللغة الألمانية', 'noor@ismailia.edu', '01001111113', 'دبلوم في اللغة الألمانية');