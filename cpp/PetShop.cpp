#include <iostream>
#include <string>
#include <iomanip>
using namespace std;

class PetShop {
    private:
        int id;
        string nama;
        double harga;
        int stok;
        string jenis;
        string bahan;
        string warna;
        string untuk;
        string size;
        string merk;
    
    public:
        // Constructor with all 10 parameters using initialization list
        PetShop(int id, string nama, double harga, int stok, 
                string jenis, string bahan, string warna, 
                string untuk, string size, string merk)
            : id(id), nama(nama), harga(harga), stok(stok), 
              jenis(jenis), bahan(bahan), warna(warna), 
              untuk(untuk), size(size), merk(merk) {}
    
        // Accessors (getter methods) - consistent naming and return types
        int getId() const { return id; }
        string getNama() const { return nama; }
        double getHarga() const { return harga; }
        int getStok() const { return stok; }
        virtual string getJenis() const { return jenis; }
        virtual string getBahan() const { return bahan; }
        virtual string getWarna() const { return warna; }
        virtual string getUntuk() const { return untuk; }
        virtual string getSize() const { return size; }
        virtual string getMerk() const { return merk; }
    
        // Virtual destructor for proper cleanup in derived classes
        virtual ~PetShop() {}
    };