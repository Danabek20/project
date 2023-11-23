<?php
require '../../database/conn.php';
$id = $_GET['id'];

$sql = "SELECT * FROM base WHERE id='$id'";
$sql = $conn->prepare($sql);
$sql -> execute();
$posts = $sql->fetch();

$sql ="DELETE FROM base WHERE id='$id'";
$conn->exec($sql);
header('location:index.php');
?>