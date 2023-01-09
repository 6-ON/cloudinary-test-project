<?php

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


Configuration::instance([
    'cloud' => [
        'cloud_name' => $_ENV['CLOUD_NAME'],
        'api_key' => $_ENV['API_KEY'],
        'api_secret' => $_ENV['API_SK']],
    'url' => [
        'secure' => true]]);


$upload = new UploadApi();

echo '<pre>';
echo json_encode(
    $upload->upload(__DIR__ . '/img/abe-img.png', [
        'resource_type' => 'image',
        'public_id' => 'test-project/abe_sample',
        'chunk_size' => 6000000,
        'eager' => [
            ['width' => 300, 'height' => 300, 'crop' => 'pad'],
            ['width' => 160, 'height' => 100, 'crop' => 'crop', 'gravity' => 'south']],
        'eager_async' => true,
    ]),
    JSON_PRETTY_PRINT
);
echo '</pre>';