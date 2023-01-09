<?php

use Cloudinary\Api\ApiUtils;
use Cloudinary\Configuration\CloudConfig;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$cloudinaryConfig = new CloudConfig([
    "cloud_name" => $_ENV['CLOUD_NAME'],
    "api_key" => $_ENV['API_KEY'],
    "api_secret" => $_ENV['API_SK']
]);

$timestamp = time();
$params =
    [
        "timestamp" => $timestamp,
        "folder" => 'testing'
    ];

$data = ['signature' => ApiUtils::signParameters($params, $cloudinaryConfig->apiSecret), 'timestamp' => $timestamp];
echo json_encode($data);

