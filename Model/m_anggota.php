<?php
require_once "Database.php";

class m_anggota {
    private $id, $nama, $tglDaftar, $status;

    public function addAnggota($nama, $status) {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("INSERT INTO anggota (nama_lengkap, status_aktif) VALUES ('$nama', $status)");
        return $rs;
    }

    public function editAnggota($id, $nama, $status) {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("ALTER TABLE anggota MODIFY nama_lengkap = '$nama' status_aktif = $status where id_anggota = $id");
        return $rs;
    }

    public function deleteAnggota($id) {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("DELETE FROM anggota WHERE id_anggota = '$idAnggota'");
        return $rs;
    }

    public function searchAnggota($katakunci) {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("SELECT * FROM anggota WHERE id_anggota = $keyword or nama_lengkap like '%$keyword%'");
        $rows = array();
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil = $rows;
        return $this->hasil;
    }

    public function showAnggota() {
        $db = new Database();
        $mysqli = $db->getConnection();
        $rs = $mysqli->query("SELECT * FROM anggota");
        $rows = array();
        while($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil = $rows;
        return $this->hasil;
    }
}