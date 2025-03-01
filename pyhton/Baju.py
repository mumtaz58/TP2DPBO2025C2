from Aksesoris import Aksesoris

class Baju(Aksesoris):
    def __init__(self, id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk):
        super().__init__(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk)
    
    def get_untuk(self):
        return super().get_untuk()
    
    def get_size(self):
        return super().get_size()
    
    def get_merk(self):
        return super().get_merk()