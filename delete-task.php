<?php
include_once "connection.php";
session_start();
$id = $_GET["id"];
$sql = "DELETE FROM task WHERE id = $id";
if (mysqli_query($connection, $sql)) {
    header("Location: task-list.php");
} else {
    echo "<script> Não foi possível deletar tarefa</script>";
}
?>