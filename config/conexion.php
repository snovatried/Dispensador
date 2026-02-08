<?php

// Load environment variables from .env file
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database configuration
return [
    'hostname' => getenv('DB_HOST') ?: 'localhost',
    'username' => getenv('DB_USER') ?: 'root',
    'password' => getenv('DB_PASS') ?: '',
    'database' => getenv('DB_NAME') ?: 'database_name',
    'port' => getenv('DB_PORT') ?: '3306',
];

// ESP32 specific configurations
if (getenv('ESP32_MODE')) {
    return array_merge(return, [
        'wifi_ssid' => getenv('ESP32_WIFI_SSID'),
        'wifi_password' => getenv('ESP32_WIFI_PASS'),
        'api_url' => getenv('ESP32_API_URL')
    ]);
}
