<?php require '../layouts/header.php'; ?>
<h1>Daftar Buku</h1>
<?php if ($_SESSION['role'] == 'admin'): ?>
    <a href="/book/create" class="btn btn-success mb-3">Tambah Buku</a>
<?php endif; ?>
<form method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari judul..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['id']; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td>
                    <a href="/book/view/<?php echo $book['id']; ?>" class="btn btn-info btn-sm">Lihat</a>
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        <a href="/book/edit/<?php echo $book['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/book/delete/<?php echo $book['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
<?php require '../layouts/footer.php'; ?>