<?php
$name = 'Some Random Magazine';
$root = '/'; // Add / to end!
$conn = mysqli_connect('localhost', 'root', 'root', 'phpmagazine');
session_name('PHPMAG');
session_start();
$admin_pwd = 'Hello';