#include "Aksesoris.cpp"

class Baju : public Aksesoris {
    public:
        // Constructor with all 10 parameters, passing them to parent constructor
        Baju(int id, string nama, double harga, int stok, 
            string jenis, string bahan, string warna, 
            string untuk, string size, string merk)
            : Aksesoris(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk) {}
    
        // Override getters as needed for Baju-specific behavior
        string getUntuk() const override { return PetShop::getUntuk(); }
        string getSize() const override { return PetShop::getSize(); }
        string getMerk() const override { return PetShop::getMerk(); }
    };