<?php
session_start();
//require 'vendor/autoload.php';

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

define('PER_PAGE', 10);

function getConnection() {
    if (!isset($_SESSION['db'])) return null;
    try {
        $dsn = "mysql:host={$_SESSION['host']};dbname={$_SESSION['db']};charset=utf8";
        return new PDO($dsn, $_SESSION['user'], $_SESSION['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $e) {
        return null;
    }
}

function saveHistory($sql) {
    $_SESSION['history'][] = $sql;
}
?>