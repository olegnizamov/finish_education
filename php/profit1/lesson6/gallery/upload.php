<?php
require_once __DIR__ . '/../class/Uploader.php';

$upload = new Uploader('picture');
$upload->upload();
header('Location: /lesson6/gallery/index.php');
