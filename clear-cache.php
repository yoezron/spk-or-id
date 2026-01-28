<?php
/**
 * Script untuk clear OpCache
 * Akses via: http://localhost/spk-or-id/clear-cache.php
 */

if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✅ OpCache berhasil di-clear!<br>";
} else {
    echo "⚠️ OpCache tidak aktif<br>";
}

echo "<br>Silakan refresh halaman menu Anda: <a href='menu'>Ke halaman Menu</a>";
