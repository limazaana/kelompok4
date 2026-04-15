<?php // Muhammad Bimo A.N.R (065123021)
// Dwi Andika Witjaksono (065124017)
include 'config.php'; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM books WHERE id = $id");
    $book = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    
    $sql = "UPDATE books SET title='$title', author='$author', year='$year' WHERE id=$id";
    
    if ($conn->query($sql)) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "خطأ في التحديث: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <title>تعديل بيانات الكتاب</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Editing Book: <?php echo $book['title']; ?></h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="edit.php">
                            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">Judul buku</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $book['title']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="author" class="form-control" value="<?php echo $book['author']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Tahun terbit</label>
                                <input type="number" name="year" class="form-control" value="<?php echo $book['year']; ?>">
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" name="update" class="btn btn-primary">Simpan perubahan</button>
                                <a href="index.php" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>