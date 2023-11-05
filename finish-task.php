<?php
include_once "connection.php";
$id = $_GET["id"];
$sql = "UPDATE task SET status = 1 WHERE id = $id";
if (mysqli_query($connection, $sql)) {
    header("Location: task-list.php");
} else {
    echo "<script> Não foi possível concluir tarefa</script>";
}
?>