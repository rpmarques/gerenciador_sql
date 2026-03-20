<?php
session_start();
if ($_POST['login'] === 'admin' && $_POST['senha'] === '1234') {
    $_SESSION['auth'] = true;
    header('Location: connect.php');
} else {
    echo "Login inválido";
}
?>