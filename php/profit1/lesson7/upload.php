<?php
require_once __DIR__ . '/app/Uploader.php';

$upload = new Uploader('picture');
$upload->upload();
header('Location: /lesson7/index.php');
