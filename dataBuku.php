<?php
include_once 'Controller/c_dataBuku.php';
$controller = new c_dataBuku();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>

<body>

<?php
  include "layouts/navbar.php";
  ?>

  <div class="container">
    <div class="row">
      <h1>Perpustakaan</h1>
    </div>
  </div>

  <br>

  <div class="container">
    <div class="row">
      <div class="col-sm-15">
        <div class="card">
          <h5 class="card-header">Data Buku  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Tambah Buku
</button></h5>

<!-- Modal -->
<form class="container" name="addition" method="post" action="">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Koleksi Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control">
        </div>

        <div class="form-group">
            <label>Nama Pengarang</label>
            <input type="text" name="pengarang" class="form-control">
        </div>

        <div class="form-group">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control">
        </div>

        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control">
        </div>

        <div class="form-group">
            <label>Tahun Terbit</label>
            <input type="text" name="tahun" class="form-control">
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name="add" class="btn btn-primary">Simpan Buku</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Tutup Modal -->

          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>ISBN</th>
                  <th>Tahun</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $controller->tampilBuku();
                ?>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal untuk Edit -->
    <form class="container" name="editBuku" method="post" action="c_dataBuku.php">
        <div class="modal fade" id="editBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <!-- ... Bagian lain dari modal ... -->
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_buku" class="form-control" value="<?php echo $idBuku; ?>" required>
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" value="<?php echo $judul; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Pegarang</label>
                    <input type="text" name="pengarang" class="form-control" value="<?php echo $pengarang; ?>" required>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="<?php echo $penerbit; ?>" required>
                </div>
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" value="<?php echo $ISBN; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun" class="form-control" value="<?php echo $tahun; ?>" required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" value="<?php echo $stok; ?>" required>
                </div>
            </div>
            <!-- ... Bagian lain dari modal ... -->
        </div>
    </form>
    <!-- Tutup Modal -->
</body>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const inputs = document.querySelectorAll('[type="text"], select');
  const submitter = document.querySelector('#addbutton');
  submitter.disabled = true;

  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('input', () => {
      const values = Array.from(inputs).map(v => v.value);
      submitter.disabled = values.includes('');
    });
  }
});
</script>
</html>