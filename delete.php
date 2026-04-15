<?php
include 'config.php';
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    if($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    if($stmt->execute() === false) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();
}
header("Location: index.php");
?>