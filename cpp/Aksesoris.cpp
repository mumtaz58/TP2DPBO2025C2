#include "PetShop.cpp"

class Aksesoris : public PetShop {
    public:
        // Constructor with all 10 parameters, passing them to parent constructor
        Aksesoris(int id, string nama, double harga, int stok, 
                 string jenis, string bahan, string warna, 
                 string untuk, string size, string merk)
            : PetShop(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk) {}
    
        // Override getters as needed for Aksesoris-specific behavior
        string getJenis() const override { return PetShop::getJenis(); }
        string getBahan() const override { return PetShop::getBahan(); }
        string getWarna() const override { return PetShop::getWarna(); }
    };