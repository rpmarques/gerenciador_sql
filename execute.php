<?php
session_start();
require 'config.php';

$conn=getConnection();
$sql=$_POST['sql'];
saveHistory($sql);

$page = $_GET['page'] ?? 1;
$offset = ($page-1)*PER_PAGE;

$sqlPaginated = stripos($sql,'select')===0 ? $sql." LIMIT ".PER_PAGE." OFFSET ".$offset : $sql;

$stmt=$conn->query($sqlPaginated);
$data=$stmt->fetchAll();

$stmtAll=$conn->query($sql);
$allData=$stmtAll->fetchAll();

$_SESSION['result']=$data;
$_SESSION['all_result']=$allData;

header('Location: result.php?page='.$page);
?>