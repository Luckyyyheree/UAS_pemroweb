<?php require '../layouts/header.php'; ?>
<h1>Tambah Buku</h1>
<form method="POST">
    <div class="mb-3"><input type="text" name="title" class="form-control" placeholder="Judul" required></div>
    <div class="mb-3"><input type="text" name="author" class="form-control" placeholder="Penulis" required></div>
    <div class="mb-3"><textarea name="description" class="form-control" placeholder="Deskripsi"></textarea></div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php require '../layouts/footer.php'; ?>