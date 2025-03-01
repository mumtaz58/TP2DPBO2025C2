#include "Aksesoris.cpp"

class Baju : public Aksesoris {
    public:
        Baju(int id, string nama, double harga, int stok, 
            string jenis, string bahan, string warna, 
            string untuk, string size, string merk)
            : Aksesoris(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk) {}
    
        string getUntuk() const override { return PetShop::getUntuk(); }
        string getSize() const override { return PetShop::getSize(); }
        string getMerk() const override { return PetShop::getMerk(); }
    };