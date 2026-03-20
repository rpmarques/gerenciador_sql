<?php
session_start();
$data=$_SESSION['result']??[];
$page=$_GET['page']??1;
?>
<table border="1">
<tr>
<?php if($data) foreach(array_keys($data[0]) as $c) echo "<th>$c</th>"; ?>
</tr>
<?php foreach($data as $row): ?>
<tr>
<?php foreach($row as $col) echo "<td>$col</td>"; ?>
</tr>
<?php endforeach; ?>
</table>

<a href="?page=<?php echo max(1,$page-1); ?>">Anterior</a>
<a href="?page=<?php echo $page+1; ?>">Próxima</a>

<br><a href="export_xlsx.php">Exportar XLSX</a>
