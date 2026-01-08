<?php require 'layouts/header.php'; ?>
<h1>Selamat Datang di Dashboard</h1>
<p>Role Anda: <?php echo $_SESSION['role']; ?></p>
<p><a href="/book" class="btn btn-primary">Lihat Daftar Buku</a></p>
<?php require 'layouts/footer.php'; ?>