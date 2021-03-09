<?php
require __DIR__ . '/app/GuestBook.php';
require __DIR__ . '/app/View.php';

$guestBook = new GuestBook();
$view = new View();
$view->assign('guestbook',$guestBook);
$view->display(__DIR__ . '/templates/guestbook/index.php');
