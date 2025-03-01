from PetShop import PetShop

class Aksesoris(PetShop):
    def __init__(self, id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk):
        super().__init__(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk)
    
    def get_jenis(self):
        return super().get_jenis()
    
    def get_bahan(self):
        return super().get_bahan()
    
    def get_warna(self):
        return super().get_warna()