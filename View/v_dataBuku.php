<?php
$bukuModel = new m_dataBuku();
$buku = $bukuModel->tampilBuku();

include_once "View/v_dataBuku.php";
foreach ($buku as $row) {
    echo "<tr>",
        "<td>{$row['id_buku']}</td>",
        "<td>{$row['judul']}</td>",
        "<td>{$row['pengarang']}</td>",
        "<td>{$row['penerbit']}</td>",
        "<td>{$row['isbn']}</td>",
        "<td>{$row['tahun']}</td>",
        "<td>{$row['stok']}</td>";
        echo "<td><a href='editBuku.php?edit={$row['id_buku']}&judul={$row['judul']}&pengarang={$row['pengarang']}&penerbit={$row['penerbit']}&isbn={$row['isbn']}&tahun={$row['tahun']}&stok={$row['stok']}' class='btn btn-primary'>Edit</a></td>";
        echo "<td><a href='controller/c_dataBuku.php?delete={$row['id_buku']}' class='btn btn-secondary'>Delete</a></td>";
        echo "</tr>";
}

echo "</tbody>";
echo "</table>";