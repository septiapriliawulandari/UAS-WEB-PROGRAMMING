<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM lowongan WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>
