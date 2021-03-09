<?php
include __DIR__ . '/../class/GuestBook.php';

if (isset($_POST['text'])) {
    $text = trim($_POST['text']);
    $guestBook = new GuestBook(__DIR__ . '/bd.txt');
    $guestBook->append($text)->save();
}

header('Location: /lesson6/guestbook/');
exit;
