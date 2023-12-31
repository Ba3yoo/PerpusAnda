<?php
require_once "Database.php";

class m_pinjam
{
    private $memberid;
    private $bookid;
    public $results;
    public function addBorrow($memberid, $bookid)
    {
        $db = new Database();
        $mysqli = $db->getConnection();
        $stock = $mysqli->query("SELECT stok FROM buku WHERE id_buku = '$bookid'");
        if ($stock > 0):
        $mysqli->query("INSERT INTO peminjaman (`tgl_pinjam`, `tgl_kembali`, `id_buku`, `id_anggota`) VALUES (NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY), '$bookid', '$memberid')");
        $mysqli->query("UPDATE buku 
        SET stok = stok - 1
        WHERE id_buku = '$bookid'");
        endif;
    }
    public function availMem()
    {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("SELECT id_anggota, nama FROM anggota WHERE status_aktif = 1");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->results = $rows;
        return $this->results;
    }
    public function availBook()
    {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("SELECT id_buku, judul FROM buku WHERE stok > 0");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->results = $rows;
        return $this->results;
    }
    public function getBorrow()
    {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("SELECT peminjaman.id_peminjaman, buku.judul, anggota.nama, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
        FROM peminjaman
        JOIN anggota ON anggota.id_anggota = peminjaman.id_anggota
        JOIN buku ON buku.id_buku = peminjaman.id_buku
        ORDER BY peminjaman.id_peminjaman ASC");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->results = $rows;
        return $this->results;
    }
}
