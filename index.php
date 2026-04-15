<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Perpustakaan Digital</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Daftar Buku Perpustakaan</h4>
                <a href="add.php" class="btn btn-success btn-sm">Tambah Buku Baru +</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th> <th>Judul</th> <th>Penulis</th> <th>Tahun</th> <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
    // هذا هو السطر 25 والأسطر المحيطة به بشكل صحيح
    $query = "SELECT * FROM books"; 
    $result = $conn->query($query);  
    
    while($row = $result->fetch_assoc()): 
            ?>
              <tr>
                  <td><?= $row['id'] ?></td>
                  <td><?= $row['title'] ?></td>
                  <td><?= $row['author'] ?></td>
                   <td><span class="badge bg-info text-dark"><?= $row['year'] ?></span></td>
                    <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">edit</a>
                  <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">delete</a>
                    </td>
                      </tr>
             <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>