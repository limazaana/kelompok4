<?php 
include 'config.php'; 
if(isset($_POST['save'])){
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $year = $_POST['year'] ?? '';
    
    $stmt = $conn->prepare("INSERT INTO books (title, author, year) VALUES (?, ?, ?)");
    if($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssi", $title, $author, $year);
    if($stmt->execute() === false) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Tambah Buku - Perpustakaan Digital Saya</title>
</head>
<body class="bg-light">
<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-body">
            <h3>Tambah Buku Baru</h3>
            <form method="POST">
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Penulis</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" name="year" class="form-control">
                </div>
                <button type="submit" name="save" class="btn btn-primary">Simpan Buku</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>