<?php
class c_dataBuku {
    public $bukuModel;

    public function tambahKolom($judul, $pengarang, $penerbit, $ISBN, $tahun, $stok) {
        include_once 'Model/m_dataBuku.php';
        $this->model = new m_dataBuku();
        $this->model->tambahBuku($judul, $pengarang, $penerbit, $ISBN, $tahun, $stok);
    }

    public function hapusBuku($idBuku) {
        include_once '../Model/m_dataBuku.php';
        $this->model = new m_dataBuku();
        $this->model->hapusBuku($idBuku);
        header('Location: ../dataBuku.php');
    }

    public function editBuku($idBuku, $judul, $pengarang, $penerbit, $ISBN, $tahun, $stok) {
        include_once 'Model/m_dataBuku.php';
        $this->model = new m_dataBuku();
        $this->model->editBuku($idBuku, $judul, $pengarang, $penerbit, $ISBN, $tahun, $stok);
    }

    public function tampilBuku() {
        include_once 'Model/m_dataBuku.php';
        $this->model = new m_dataBuku();
        $borrow = $this->model->tampilBuku();
        include 'View/v_dataBuku.php';
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $controller = new c_dataBuku();
    $controller->hapusBuku($id);
} else if (isset($_POST['add'])) {
    $dataBuku = new c_dataBuku();
    $dataBuku->tambahKolom($_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['isbn'], $_POST['tahun'], $_POST['stok']);
    unset($_POST['add']);
    header('Location: dataBuku.php');
} else if(isset($_POST['edit'])){
    $idBuku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $ISBN = $_POST['isbn'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];
    $controller = new c_dataBuku();
    $controller->editBuku($idBuku, $judul, $pengarang, $penerbit, $ISBN, $tahun, $stok);
    header('Location: dataBuku.php');
}