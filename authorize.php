<?php
$username = 'admin';
$password = 'admin';
if (!isset($_SERVER['PHP_AUTH_USER'])
    || !isset($_SERVER['PHP_AUTH_PW'])
    || ($_SERVER['PHP_AUTH_USER'] != $username)
    || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm = "PRODUCT NAME"');
    exit('<h2>PRODUCT NAME</h2>Sorry, you must enter a valid username and password to access this page.');
}
?>