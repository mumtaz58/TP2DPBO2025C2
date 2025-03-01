class PetShop:
    def __init__(self, id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk):
        self.id = id
        self.nama = nama
        self.harga = harga
        self.stok = stok
        self.jenis = jenis
        self.bahan = bahan
        self.warna = warna
        self.untuk = untuk
        self.size = size
        self.merk = merk
    
    def get_id(self):
        return self.id
    
    def get_nama(self):
        return self.nama
    
    def get_harga(self):
        return self.harga
    
    def get_stok(self):
        return self.stok
    
    def get_jenis(self):
        return self.jenis
    
    def get_bahan(self):
        return self.bahan
    
    def get_warna(self):
        return self.warna
    
    def get_untuk(self):
        return self.untuk
    
    def get_size(self):
        return self.size
    
    def get_merk(self):
        return self.merk
