import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class PetShopMain {
    private static void printBorder(List<Integer> widths) {
        System.out.print("+");
        for (int width : widths) {
            System.out.print("-".repeat(width + 2) + "+");
        }
        System.out.println();
    }
    
    private static void displayProducts(List<PetShop> products) {
        if (products.isEmpty()) {
            System.out.println("Tidak ada produk dalam daftar.");
            return;
        }
        
        System.out.println("\n=== INFORMASI PRODUK PETSHOP LENGKAP ===\n");
        
        List<String> headers = List.of(
            "ID", "Nama Produk", "Harga", "Stok", 
            "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk"
        );
        
        List<Integer> columnWidths = new ArrayList<>(List.of(5, 15, 12, 8, 10, 10, 10, 10, 8, 10));
        
        for (int i = 0; i < headers.size(); i++) {
            columnWidths.set(i, Math.max(columnWidths.get(i), headers.get(i).length()));
        }
        
        for (PetShop product : products) {
            columnWidths.set(0, Math.max(columnWidths.get(0), String.valueOf(product.getId()).length()));
            columnWidths.set(1, Math.max(columnWidths.get(1), product.getNama().length()));
            columnWidths.set(2, Math.max(columnWidths.get(2), String.valueOf(product.getHarga()).length() + 3)); // For decimal places
            columnWidths.set(3, Math.max(columnWidths.get(3), String.valueOf(product.getStok()).length()));
            columnWidths.set(4, Math.max(columnWidths.get(4), product.getJenis().length()));
            columnWidths.set(5, Math.max(columnWidths.get(5), product.getBahan().length()));
            columnWidths.set(6, Math.max(columnWidths.get(6), product.getWarna().length()));
            columnWidths.set(7, Math.max(columnWidths.get(7), product.getUntuk().length()));
            columnWidths.set(8, Math.max(columnWidths.get(8), product.getSize().length()));
            columnWidths.set(9, Math.max(columnWidths.get(9), product.getMerk().length()));
        }
        
        printBorder(columnWidths);
        
        System.out.print("| ");
        for (int i = 0; i < headers.size(); i++) {
            System.out.printf("%-" + columnWidths.get(i) + "s | ", headers.get(i));
        }
        System.out.println();
        
        printBorder(columnWidths);
        
        for (PetShop product : products) {
            System.out.printf("| %-" + columnWidths.get(0) + "d | ", product.getId());
            System.out.printf("%-" + columnWidths.get(1) + "s | ", product.getNama());
            System.out.printf("%-" + columnWidths.get(2) + ".2f | ", product.getHarga());
            System.out.printf("%-" + columnWidths.get(3) + "d | ", product.getStok());
            System.out.printf("%-" + columnWidths.get(4) + "s | ", product.getJenis());
            System.out.printf("%-" + columnWidths.get(5) + "s | ", product.getBahan());
            System.out.printf("%-" + columnWidths.get(6) + "s | ", product.getWarna());
            System.out.printf("%-" + columnWidths.get(7) + "s | ", product.getUntuk());
            System.out.printf("%-" + columnWidths.get(8) + "s | ", product.getSize());
            System.out.printf("%-" + columnWidths.get(9) + "s |\n", product.getMerk());
        }
        
        printBorder(columnWidths);
        System.out.println();
    }
    
    private static void addProduct(List<PetShop> products, Scanner scanner) {
        int id, stok;
        double harga;
        String nama, jenis, bahan, warna, untuk, size, merk;
        int tipe;
        
        System.out.println("Pilih tipe produk:\n1. PetShop\n2. Aksesoris\n3. Baju\nPilihan: ");
        tipe = scanner.nextInt();
        scanner.nextLine(); 
        
        System.out.print("Masukkan ID: ");
        id = scanner.nextInt();
        scanner.nextLine(); 
        
        System.out.print("Masukkan Nama Produk: ");
        nama = scanner.nextLine();
        
        System.out.print("Masukkan Harga: ");
        harga = scanner.nextDouble();
        
        System.out.print("Masukkan Stok: ");
        stok = scanner.nextInt();
        scanner.nextLine(); 
        
        System.out.print("Masukkan Jenis: ");
        jenis = scanner.nextLine();
        
        System.out.print("Masukkan Bahan: ");
        bahan = scanner.nextLine();
        
        System.out.print("Masukkan Warna: ");
        warna = scanner.nextLine();
        
        System.out.print("Masukkan Untuk: ");
        untuk = scanner.nextLine();
        
        System.out.print("Masukkan Size: ");
        size = scanner.nextLine();
        
        System.out.print("Masukkan Merk: ");
        merk = scanner.nextLine();
        
        switch (tipe) {
            case 1:
                products.add(new PetShop(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
                break;
            case 2:
                products.add(new Aksesoris(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
                break;
            case 3:
                products.add(new Baju(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
                break;
            default:
                System.out.println("Pilihan tidak valid!");
        }
    }
    
    private static void displayMenu() {
        System.out.println("\n=== MENU SISTEM PETSHOP ===");
        System.out.println("1. Tampilkan Semua Produk");
        System.out.println("2. Tambah Produk Baru");
        System.out.println("3. Keluar");
        System.out.print("Pilihan: ");
    }
    
    public static void main(String[] args) {
        List<PetShop> products = new ArrayList<>();
        
        // Add initial products
        products.add(new PetShop(1, "Dog Leash", 45000, 18, "Tali", "Nylon", "Biru", "Anjing", "L", "PetGo"));
        products.add(new PetShop(2, "Cat Bed", 30000, 25, "Bantal", "Katun", "Abu-Abu", "Kucing", "M", "CozyPet"));
        products.add(new Aksesoris(3, "Dog Collar", 35000, 10, "Kalung", "Kulit", "Hitam", "Anjing", "L", "PetGo"));
        products.add(new Aksesoris(4, "Cat Harness", 40000, 12, "Tali", "Nylon", "Merah", "Kucing", "S", "CatWalk"));
        products.add(new Baju(5, "Dog Sweater", 75000, 8, "Pakaian", "Wol", "Biru", "Anjing", "M", "PetFashion"));
        
        displayProducts(products);
        
        Scanner scanner = new Scanner(System.in);
        int choice;
        boolean running = true;
        
        while (running) {
            displayMenu();
            choice = scanner.nextInt();
            scanner.nextLine();
            
            switch (choice) {
                case 1:
                    displayProducts(products);
                    break;
                case 2:
                    addProduct(products, scanner);
                    displayProducts(products);
                    break;
                case 3:
                    running = false;
                    System.out.println("Terima kasih telah menggunakan sistem PetShop!");
                    break;
                default:
                    System.out.println("Pilihan tidak valid! Silakan coba lagi.");
            }
        }
        
        scanner.close();
    }
}