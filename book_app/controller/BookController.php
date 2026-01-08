<?php
require_once 'models/Book.php';

class BookController {
    private function checkAdmin() {
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /dashboard');
            exit;
        }
    }

    public function index() {
        $bookModel = new Book();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $books = $bookModel->read($search, $page);
        $total = $bookModel->getTotal($search);
        $pages = ceil($total / 10);
        require 'views/books/list.php';
    }

    public function create() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookModel = new Book();
            if ($bookModel->create($_POST['title'], $_POST['author'], $_POST['description'])) {
                header('Location: /book');
                exit;
            }
        }
        require 'views/books/create.php';
    }

    public function edit($id) {
        $this->checkAdmin();
        $bookModel = new Book();
        $book = $bookModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($bookModel->update($id, $_POST['title'], $_POST['author'], $_POST['description'])) {
                header('Location: /book');
                exit;
            }
        }
        require 'views/books/edit.php';
    }

    public function view($id) {
        $bookModel = new Book();
        $book = $bookModel->getById($id);
        require 'views/books/view.php';
    }

    public function delete($id) {
        $this->checkAdmin();
        $bookModel = new Book();
        $bookModel->delete($id);
        header('Location: /book');
        exit;
    }
}