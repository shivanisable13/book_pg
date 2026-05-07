<?php
// ==========================================
// CampusStay Configuration File
// File: includes/config/config.php
// ==========================================

// ------------------------------------------
// TIMEZONE
// ------------------------------------------
date_default_timezone_set('Asia/Kolkata');

// ------------------------------------------
// APPLICATION SETTINGS
// ------------------------------------------
define('APP_NAME', 'CampusStay');

// Dynamic APP_URL Detection
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

$current_dir = str_replace('\\', '/', __DIR__);
$doc_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

$relative_path = str_replace($doc_root, '', $current_dir);
$project_root = str_replace('/includes/config', '', $relative_path);

define('APP_URL', $protocol . "://" . $host . $project_root);

// Base Project Path
define('BASE_PATH', dirname(__DIR__, 2));

// ------------------------------------------
// DATABASE CONFIGURATION
// ------------------------------------------
define('DB_HOST', '127.0.0.1');      // Use 127.0.0.1 instead of localhost
define('DB_NAME', 'campusstay');
define('DB_USER', 'root');
define('DB_PASS', '');               // Enter MySQL password here

// ------------------------------------------
// DATABASE CONNECTION (PDO)
// ------------------------------------------
try {

    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS
    );

    // PDO Error Mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Default Fetch Mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Connection failed: " . $e->getMessage());

}

// ------------------------------------------
// PAYMENT GATEWAY (RAZORPAY)
// ------------------------------------------
define('RAZORPAY_KEY_ID', 'rzp_test_SjNPEU6SPz0j2X');
define('RAZORPAY_KEY_SECRET', 'your_secret_key');

// ------------------------------------------
// GOOGLE MAPS API
// ------------------------------------------
define('GOOGLE_MAPS_KEY', 'your_google_maps_key');

// ------------------------------------------
// EMAIL CONFIGURATION
// ------------------------------------------
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);

define('SMTP_USER', 'shivanisable031@gmail.com');

// Gmail App Password
define('SMTP_PASS', 'muxg xvfi hysb cycf');

define('SMTP_FROM', 'shivanisable031@gmail.com');
define('SMTP_FROM_NAME', 'CampusStay');

// ------------------------------------------
// SESSION SETTINGS
// ------------------------------------------
if (session_status() === PHP_SESSION_NONE) {

    session_start();

}

// ------------------------------------------
// SECURITY SETTINGS
// ------------------------------------------

// Prevent Clickjacking
header('X-Frame-Options: SAMEORIGIN');

// Prevent MIME Type Sniffing
header('X-Content-Type-Options: nosniff');

// Enable XSS Protection
header('X-XSS-Protection: 1; mode=block');

// ------------------------------------------
// ERROR REPORTING
// ------------------------------------------

// DEVELOPMENT MODE
error_reporting(E_ALL);
ini_set('display_errors', 1);

// FOR PRODUCTION USE:
// error_reporting(0);
// ini_set('display_errors', 0);

// ------------------------------------------
// DEFAULT PROFILE IMAGE
// ------------------------------------------
define('DEFAULT_USER_IMAGE', 'default_user.png');

// ------------------------------------------
// FILE UPLOAD SETTINGS
// ------------------------------------------
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB

$allowed_extensions = [
    'jpg',
    'jpeg',
    'png',
    'webp'
];

// ------------------------------------------
// OTP SETTINGS
// ------------------------------------------
define('OTP_EXPIRY_MINUTES', 10);

// ------------------------------------------
// PAGINATION SETTINGS
// ------------------------------------------
define('RECORDS_PER_PAGE', 10);

// ------------------------------------------
// PROJECT DIRECTORIES
// ------------------------------------------
define('UPLOAD_PATH', BASE_PATH . '/uploads/');
define('USER_UPLOAD_PATH', UPLOAD_PATH . 'users/');
define('PROPERTY_UPLOAD_PATH', UPLOAD_PATH . 'properties/');

// ==========================================
// END OF CONFIG FILE
// ==========================================
?>
