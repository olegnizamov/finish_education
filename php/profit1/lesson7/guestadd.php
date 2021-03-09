<?php
require_once __DIR__ . '/app/GuestBook.php';
require_once __DIR__ . '/app/GuestBookRecord.php';

if(!empty($_POST['text'])){
    $guestBook = new GuestBook();
    $record = new GuestBookRecord($_POST['text']);
    $guestBook->add($record)->save();
}

header('Location: /lesson7/guestindex.php');
exit;
