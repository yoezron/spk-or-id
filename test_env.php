<?php
/**
 * Environment Variables Debug Script
 * Access: http://localhost/spk-or-id/test_env.php
 */

echo "<h1>Environment Variables Debug</h1>";
echo "<pre>";

// Check if vendor/autoload exists
echo "=== STEP 1: Check Composer Autoload ===\n";
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    echo "✓ vendor/autoload.php EXISTS\n";
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    echo "✗ vendor/autoload.php NOT FOUND\n";
    echo "Run: composer install\n";
    exit;
}

// Check if .env exists
echo "\n=== STEP 2: Check .env File ===\n";
$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    echo "✓ .env file EXISTS at: $envPath\n";
    echo "File size: " . filesize($envPath) . " bytes\n";
    echo "Readable: " . (is_readable($envPath) ? 'YES' : 'NO') . "\n";
} else {
    echo "✗ .env file NOT FOUND\n";
    echo "Expected location: $envPath\n";
    exit;
}

// Load .env
echo "\n=== STEP 3: Load Environment Variables ===\n";
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    echo "✓ Dotenv loaded successfully\n";
} catch (Exception $e) {
    echo "✗ Error loading .env: " . $e->getMessage() . "\n";
    exit;
}

// Check environment variables
echo "\n=== STEP 4: Check Database Variables ===\n";
$dbVars = [
    'DB_HOSTNAME',
    'DB_USERNAME',
    'DB_PASSWORD',
    'DB_DATABASE',
    'DB_DRIVER'
];

foreach ($dbVars as $var) {
    if (isset($_ENV[$var])) {
        if ($var === 'DB_PASSWORD') {
            echo "✓ $var: SET (length: " . strlen($_ENV[$var]) . " chars)\n";
        } else {
            echo "✓ $var: " . $_ENV[$var] . "\n";
        }
    } else {
        echo "✗ $var: NOT SET\n";
    }
}

// Test getenv() vs $_ENV
echo "\n=== STEP 5: Test getenv() vs \$_ENV ===\n";
echo "getenv('DB_PASSWORD'): " . (getenv('DB_PASSWORD') ?: 'EMPTY') . "\n";
echo "\$_ENV['DB_PASSWORD']: " . ($_ENV['DB_PASSWORD'] ?? 'NOT SET') . "\n";
echo "\$_SERVER['DB_PASSWORD']: " . ($_SERVER['DB_PASSWORD'] ?? 'NOT SET') . "\n";

// Test database connection
echo "\n=== STEP 6: Test Database Connection ===\n";
$hostname = $_ENV['DB_HOSTNAME'] ?? 'localhost';
$username = $_ENV['DB_USERNAME'] ?? 'root';
$password = $_ENV['DB_PASSWORD'] ?? '';
$database = $_ENV['DB_DATABASE'] ?? 'u515429144_login';

echo "Attempting connection with:\n";
echo "- Host: $hostname\n";
echo "- User: $username\n";
echo "- Pass: " . (empty($password) ? 'EMPTY!' : 'SET (' . strlen($password) . ' chars)') . "\n";
echo "- Database: $database\n\n";

try {
    $mysqli = new mysqli($hostname, $username, $password, $database);

    if ($mysqli->connect_error) {
        echo "✗ Connection FAILED: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "\n";
    } else {
        echo "✓ Connection SUCCESSFUL!\n";
        echo "MySQL version: " . $mysqli->server_info . "\n";
        $mysqli->close();
    }
} catch (Exception $e) {
    echo "✗ Exception: " . $e->getMessage() . "\n";
}

// Check PHP info
echo "\n=== STEP 7: PHP Information ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "OS: " . PHP_OS . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "Script Path: " . __FILE__ . "\n";

echo "\n=== STEP 8: Recommendations ===\n";
if (!isset($_ENV['DB_PASSWORD']) || empty($_ENV['DB_PASSWORD'])) {
    echo "⚠️ DB_PASSWORD not loaded!\n";
    echo "\nPossible solutions:\n";
    echo "1. Restart Apache/Nginx\n";
    echo "2. Check .env file permissions\n";
    echo "3. Clear opcode cache (opcache_reset)\n";
    echo "4. Verify .env file encoding (UTF-8, no BOM)\n";
}

echo "</pre>";

// Add opcache clear button
if (function_exists('opcache_reset')) {
    echo '<form method="post">';
    echo '<button type="submit" name="clear_cache">Clear OpCache</button>';
    echo '</form>';

    if (isset($_POST['clear_cache'])) {
        opcache_reset();
        echo '<p style="color: green;">✓ OpCache cleared! Refresh the page.</p>';
    }
}
?>
