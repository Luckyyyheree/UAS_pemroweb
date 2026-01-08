<?php require '../layouts/header.php'; ?>
<h1>Edit Buku</h1>
<form method="POST">
    <div class="mb-3"><input type="text" name="title" class="form-control" value="<?php echo $book['title']; ?>" required></div>
    <div class="mb-3"><input type="text" name="author" class="form-control" value="<?php echo $book['author']; ?>" required></div>
    <div class="mb-3"><textarea name="description" class="form-control"><?php echo $book['description']; ?></textarea></div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php require '../layouts/footer.php'; ?>