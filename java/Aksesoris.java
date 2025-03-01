public class Aksesoris extends PetShop {
    public Aksesoris(int id, String nama, double harga, int stok,
                   String jenis, String bahan, String warna,
                   String untuk, String size, String merk) {
        super(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk);
    }
    
    @Override
    public String getJenis() { return super.getJenis(); }
    
    @Override
    public String getBahan() { return super.getBahan(); }
    
    @Override
    public String getWarna() { return super.getWarna(); }
}