<?php require '../layouts/header.php'; ?>
<h1>Detail Buku: <?php echo $book['title']; ?></h1>
<p><strong>Penulis:</strong> <?php echo $book['author']; ?></p>
<p><strong>Deskripsi:</strong> <?php echo $book['description']; ?></p>
<a href="/book" class="btn btn-secondary">Kembali</a>
<?php require '../layouts/footer.php'; ?>