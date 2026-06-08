-- قاعدة البيانات للمجمع التعليمي للغات بالإسماعيلية

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `email` varchar(100),
  `role` enum('admin','superadmin') DEFAULT 'admin',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES 
('admin', '$2y$10$YIjlrBxvgQvB5ZeUVP8H.eYzF8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z8Z', 'admin@ismailia.edu', 'admin');

INSERT INTO `students` (`name`, `level`, `email`, `phone`) VALUES 
('أحمد محمد علي', 'مستوى متقدم', 'ahmed@example.com', '01001234567'),
('فاطمة السيد حسن', 'مستوى متوسط', 'fatima@example.com', '01101234567'),
('محمود عبدالله سالم', 'مستوى أساسي', 'mahmoud@example.com', '01201234567');

INSERT INTO `teachers` (`name`, `specialization`, `email`, `phone`, `qualifications`) VALUES 
('د. سارة محمود', 'اللغة الإنجليزية', 'sarah@ismailia.edu', '01001111111', 'ماجستير في اللغة الإنجليزية'),
('أ. علي حسن', 'اللغة الفرنسية', 'ali@ismailia.edu', '01001111112', 'بكالوريوس في اللغة الفرنسية'),
('أ. نور أحمد', 'اللغة الألمانية', 'noor@ismailia.edu', '01001111113', 'دبلوم في اللغة الألمانية');
