#include "Baju.cpp"
#include <vector>

void printBorder(const vector<size_t>& widths) {
    cout << "+";
    for (size_t width : widths) {
        cout << string(width + 2, '-') << "+";
    }
    cout << endl;
}

void displayProducts(const vector<PetShop*>& products) {
    if (products.empty()) {
        cout << "Tidak ada produk dalam daftar.\n";
        return;
    }

    cout << "\n=== INFORMASI PRODUK PETSHOP LENGKAP ===\n";
    
    vector<string> headers = {
        "ID", "Nama Produk", "Harga", "Stok", 
        "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk"
    };
    
    vector<size_t> columnWidths = {5, 15, 12, 8, 10, 10, 10, 10, 8, 10};

    for (size_t i = 0; i < headers.size(); i++) {
        columnWidths[i] = max(columnWidths[i], headers[i].length());
    }

    for (const auto& product : products) {
        columnWidths[0] = max(columnWidths[0], to_string(product->getId()).length());
        columnWidths[1] = max(columnWidths[1], product->getNama().length());
        columnWidths[2] = max(columnWidths[2], to_string(product->getHarga()).length() + 3); // For decimal places
        columnWidths[3] = max(columnWidths[3], to_string(product->getStok()).length());
        columnWidths[4] = max(columnWidths[4], product->getJenis().length());
        columnWidths[5] = max(columnWidths[5], product->getBahan().length());
        columnWidths[6] = max(columnWidths[6], product->getWarna().length());
        columnWidths[7] = max(columnWidths[7], product->getUntuk().length());
        columnWidths[8] = max(columnWidths[8], product->getSize().length());
        columnWidths[9] = max(columnWidths[9], product->getMerk().length());
    }

    printBorder(columnWidths);
    
    cout << "| ";
    for (size_t i = 0; i < headers.size(); i++) {
        cout << setw(columnWidths[i]) << left << headers[i] << " | ";
    }
    cout << endl;
    
    printBorder(columnWidths);

    for (const auto& product : products) {
        cout << "| " << setw(columnWidths[0]) << left << product->getId()
             << " | " << setw(columnWidths[1]) << left << product->getNama()
             << " | " << setw(columnWidths[2]) << left << fixed << setprecision(2) << product->getHarga()
             << " | " << setw(columnWidths[3]) << left << product->getStok()
             << " | " << setw(columnWidths[4]) << left << product->getJenis()
             << " | " << setw(columnWidths[5]) << left << product->getBahan()
             << " | " << setw(columnWidths[6]) << left << product->getWarna()
             << " | " << setw(columnWidths[7]) << left << product->getUntuk()
             << " | " << setw(columnWidths[8]) << left << product->getSize()
             << " | " << setw(columnWidths[9]) << left << product->getMerk()
             << " |" << endl;
    }

    printBorder(columnWidths);
    cout << endl;
}

void addProduct(vector<PetShop*>& products) {
    int id, stok;
    double harga;
    string nama, jenis, bahan, warna, untuk, size, merk;
    int tipe;

    cout << "Pilih tipe produk:\n1. PetShop\n2. Aksesoris\n3. Baju\nPilihan: ";
    cin >> tipe;
    cin.ignore();

    cout << "Masukkan ID: ";
    cin >> id;
    cin.ignore();
    cout << "Masukkan Nama Produk: ";
    getline(cin, nama);
    cout << "Masukkan Harga: ";
    cin >> harga;
    cout << "Masukkan Stok: ";
    cin >> stok;
    cin.ignore();
    cout << "Masukkan Jenis: ";
    getline(cin, jenis);
    cout << "Masukkan Bahan: ";
    getline(cin, bahan);
    cout << "Masukkan Warna: ";
    getline(cin, warna);
    cout << "Masukkan Untuk: ";
    getline(cin, untuk);
    cout << "Masukkan Size: ";
    getline(cin, size);
    cout << "Masukkan Merk: ";
    getline(cin, merk);

    if (tipe == 1) {
        products.push_back(new PetShop(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
    } else if (tipe == 2) {
        products.push_back(new Aksesoris(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
    } else if (tipe == 3) {
        products.push_back(new Baju(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
    } else {
        cout << "Pilihan tidak valid!\n";
    }
}

void displayMenu() {
    cout << "\n=== MENU SISTEM PETSHOP ===\n";
    cout << "1. Tampilkan Semua Produk\n";
    cout << "2. Tambah Produk Baru\n";
    cout << "3. Keluar\n";
    cout << "Pilihan: ";
}

int main() {
    vector<PetShop*> products = {
        new PetShop(1, "Dog Leash", 45000, 18, "Tali", "Nylon", "Biru", "Anjing", "L", "PetGo"),
        new PetShop(2, "Cat Bed", 30000, 25, "Bantal", "Katun", "Abu-Abu", "Kucing", "M", "CozyPet"),
        
        new Aksesoris(3, "Dog Collar", 35000, 10, "Kalung", "Kulit", "Hitam", "Anjing", "L", "PetGo"),
        new Aksesoris(4, "Cat Harness", 40000, 12, "Tali", "Nylon", "Merah", "Kucing", "S", "CatWalk"),
        
        new Baju(5, "Dog Sweater", 75000, 8, "Pakaian", "Wol", "Biru", "Anjing", "M", "PetFashion"),
    };

    displayProducts(products);

    int choice;
    bool running = true;

    while (running) {
        displayMenu();
        cin >> choice;
        cin.ignore();

        switch (choice) {
            case 1:
                displayProducts(products);
                break;
            case 2:
                addProduct(products);
                displayProducts(products);
                break;
            case 3:
                running = false;
                cout << "Terima kasih telah menggunakan sistem PetShop!\n";
                break;
            default:
                cout << "Pilihan tidak valid! Silakan coba lagi.\n";
        }
    }

    for (auto product : products) {
        delete product;
    }
    products.clear();

    return 0;
}