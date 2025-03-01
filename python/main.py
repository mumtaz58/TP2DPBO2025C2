from PetShop import PetShop
from Aksesoris import Aksesoris
from Baju import Baju

def print_border(widths):
    print("+", end="")
    for width in widths:
        print("-" * (width + 2) + "+", end="")
    print()


def display_products(products):
    if not products:
        print("Tidak ada produk dalam daftar.")
        return
    
    print("\n=== INFORMASI PRODUK PETSHOP LENGKAP ===")
    
    headers = [
        "ID", "Nama Produk", "Harga", "Stok", 
        "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk"
    ]
    
    column_widths = [5, 15, 12, 8, 10, 10, 10, 10, 8, 10]
    
    # Adjust column widths based on headers
    for i in range(len(headers)):
        column_widths[i] = max(column_widths[i], len(headers[i]))
    
    # Adjust column widths based on product data
    for product in products:
        column_widths[0] = max(column_widths[0], len(str(product.get_id())))
        column_widths[1] = max(column_widths[1], len(product.get_nama()))
        column_widths[2] = max(column_widths[2], len(f"{product.get_harga():.2f}"))
        column_widths[3] = max(column_widths[3], len(str(product.get_stok())))
        column_widths[4] = max(column_widths[4], len(product.get_jenis()))
        column_widths[5] = max(column_widths[5], len(product.get_bahan()))
        column_widths[6] = max(column_widths[6], len(product.get_warna()))
        column_widths[7] = max(column_widths[7], len(product.get_untuk()))
        column_widths[8] = max(column_widths[8], len(product.get_size()))
        column_widths[9] = max(column_widths[9], len(product.get_merk()))
    
    print_border(column_widths)
    
    print("| ", end="")
    for i in range(len(headers)):
        print(f"{headers[i]:{column_widths[i]}s} | ", end="")
    print()
    
    print_border(column_widths)
    
    for product in products:
        print(f"| {product.get_id():{column_widths[0]}d} | "
              f"{product.get_nama():{column_widths[1]}s} | "
              f"{product.get_harga():{column_widths[2]}.2f} | "
              f"{product.get_stok():{column_widths[3]}d} | "
              f"{product.get_jenis():{column_widths[4]}s} | "
              f"{product.get_bahan():{column_widths[5]}s} | "
              f"{product.get_warna():{column_widths[6]}s} | "
              f"{product.get_untuk():{column_widths[7]}s} | "
              f"{product.get_size():{column_widths[8]}s} | "
              f"{product.get_merk():{column_widths[9]}s} |")
    
    print_border(column_widths)
    print()


def add_product(products):
    print("Pilih tipe produk:\n1. PetShop\n2. Aksesoris\n3. Baju\nPilihan: ", end="")
    tipe = int(input())
    
    id = int(input("Masukkan ID: "))
    nama = input("Masukkan Nama Produk: ")
    harga = float(input("Masukkan Harga: "))
    stok = int(input("Masukkan Stok: "))
    jenis = input("Masukkan Jenis: ")
    bahan = input("Masukkan Bahan: ")
    warna = input("Masukkan Warna: ")
    untuk = input("Masukkan Untuk: ")
    size = input("Masukkan Size: ")
    merk = input("Masukkan Merk: ")
    
    if tipe == 1:
        products.append(PetShop(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk))
    elif tipe == 2:
        products.append(Aksesoris(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk))
    elif tipe == 3:
        products.append(Baju(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk))
    else:
        print("Pilihan tidak valid!")


def display_menu():
    print("\n=== MENU SISTEM PETSHOP ===")
    print("1. Tampilkan Semua Produk")
    print("2. Tambah Produk Baru")
    print("3. Keluar")
    print("Pilihan: ", end="")


def main():
    products = [
        PetShop(1, "Dog Leash", 45000, 18, "Tali", "Nylon", "Biru", "Anjing", "L", "PetGo"),
        PetShop(2, "Cat Bed", 30000, 25, "Bantal", "Katun", "Abu-Abu", "Kucing", "M", "CozyPet"),
        Aksesoris(3, "Dog Collar", 35000, 10, "Kalung", "Kulit", "Hitam", "Anjing", "L", "PetGo"),
        Aksesoris(4, "Cat Harness", 40000, 12, "Tali", "Nylon", "Merah", "Kucing", "S", "CatWalk"),
        Baju(5, "Dog Sweater", 75000, 8, "Pakaian", "Wol", "Biru", "Anjing", "M", "PetFashion")
    ]
    
    display_products(products)
    
    running = True
    while running:
        display_menu()
        choice = int(input())
        
        if choice == 1:
            display_products(products)
        elif choice == 2:
            add_product(products)
            display_products(products)
        elif choice == 3:
            running = False
            print("Terima kasih telah menggunakan sistem PetShop!")
        else:
            print("Pilihan tidak valid! Silakan coba lagi.")


if __name__ == "__main__":
    main()