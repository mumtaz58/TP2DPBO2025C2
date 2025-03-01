public class Baju extends Aksesoris {
    public Baju(int id, String nama, double harga, int stok,
              String jenis, String bahan, String warna,
              String untuk, String size, String merk) {
        super(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk);
    }
    
    @Override
    public String getUntuk() { return super.getUntuk(); }
    
    @Override
    public String getSize() { return super.getSize(); }
    
    @Override
    public String getMerk() { return super.getMerk(); }
}