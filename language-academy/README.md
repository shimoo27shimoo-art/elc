# المجمع التعليمي للغات بالإسماعيلية

## نظرة عامة
موقع ويب متكامل للمجمع التعليمي للغات بالإسماعيلية، يوفر:
- صفحة رئيسية حديثة وجذابة
- لوحة تحكم أدمن لإدارة المحتوى
- إدارة الطلاب والمعلمين
- إدارة الأخبار والإعلانات
- معرض صور تفاعلي
- شريط أخبار متحرك

## المميزات

✅ تصميم استجابي (Responsive)
✅ دعم اللغة العربية
✅ لوحة تحكم آمنة
✅ سرعة عالية
✅ قابل للتطوير

## المتطلبات
- PHP 7.4+
- MySQL 5.7+
- Web Server (Apache/Nginx)

## التثبيت السريع

### 1. إنشاء قاعدة البيانات
استورد ملف `database.sql` عبر phpMyAdmin

### 2. تعديل الإعدادات
عدّل `includes/config.php`:
```php
define('DB_PASS', 'your_password');
define('SITE_URL', 'your-domain.com');
```

### 3. رفع الملفات عبر FTP
```
FTP Host: ftpupload.net
Username: if0_42134011
Password: GdB1F8mY5BCJS
Port: 21
```

## الوصول لللموقع

- الرئيسية: http://your-domain.com
- دخول الأدمن: http://your-domain.com/login.php
- Username: admin

## الملفات الرئيسية

- `index.php` - الصفحة الرئيسية
- `login.php` - صفحة الدخول
- `admin/dashboard.php` - لوحة التحكم
- `includes/config.php` - إعدادات البيانات
- `includes/functions.php` - الدوال الأساسية
- `css/style.css` - أنماط الموقع
- `js/main.js` - سكريبتات JavaScript

## الترخيص

© 2024 المجمع التعليمي للغات بالإسماعيلية