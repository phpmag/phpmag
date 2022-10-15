<?php
$name = 'Some Random Magazine';
$root = '/'; // Add / to end!
$conn = mysqli_connect('localhost', 'root', 'root', 'phpmagazine');
######################
$devmode = true;     #
# WANRING! This will #
# make everyone an   #
# administrator!!!   #
######################
if ($devmode) {
    $_SESSION['loggedin'] = true;
}