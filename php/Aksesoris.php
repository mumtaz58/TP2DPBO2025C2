<?php
require_once('PetShop.php');

class Aksesoris extends PetShop {
    public function __construct($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk = "") {
        parent::__construct($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk);
    }
}
?>