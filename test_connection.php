<?php
session_start();
require 'config.php';

$_SESSION['host']=$_POST['host'];
$_SESSION['db']=$_POST['db'];
$_SESSION['user']=$_POST['user'];
$_SESSION['pass']=$_POST['pass'];

$conn=getConnection();
if($conn) header('Location: dashboard.php');
else echo 'Erro conexão';
?>