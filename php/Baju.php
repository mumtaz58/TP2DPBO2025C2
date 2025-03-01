<?php
require_once('Aksesoris.php');

class Baju extends Aksesoris {
    public function __construct($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk = "") {
        parent::__construct($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk);
    }
}
?>