<?php
class PetShop {
    protected $id;
    protected $nama;
    protected $harga;
    protected $stok;
    protected $jenis;
    protected $bahan;
    protected $warna;
    protected $untuk;
    protected $size;
    protected $merk;
    protected $foto_produk; 

    public function __construct($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk = "") {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->jenis = $jenis;
        $this->bahan = $bahan;
        $this->warna = $warna;
        $this->untuk = $untuk;
        $this->size = $size;
        $this->merk = $merk;
        $this->foto_produk = $foto_produk;
    }

    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getHarga() { return $this->harga; }
    public function getStok() { return $this->stok; }
    public function getJenis() { return $this->jenis; }
    public function getBahan() { return $this->bahan; }
    public function getWarna() { return $this->warna; }
    public function getUntuk() { return $this->untuk; }
    public function getSize() { return $this->size; }
    public function getMerk() { return $this->merk; }
    public function getFotoProduk() { return $this->foto_produk; }
    
    public function setFotoProduk($foto_produk) { $this->foto_produk = $foto_produk; }
}
?>