public class PetShop {
    private int id;
    private String nama;
    private double harga;
    private int stok;
    private String jenis;
    private String bahan;
    private String warna;
    private String untuk;
    private String size;
    private String merk;
    
    public PetShop(int id, String nama, double harga, int stok,
                  String jenis, String bahan, String warna,
                  String untuk, String size, String merk) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
        this.stok = stok;
        this.jenis = jenis;
        this.bahan = bahan;
        this.warna = warna;
        this.untuk = untuk;
        this.size = size;
        this.merk = merk;
    }
    
    public int getId() { return id; }
    public String getNama() { return nama; }
    public double getHarga() { return harga; }
    public int getStok() { return stok; }
    public String getJenis() { return jenis; }
    public String getBahan() { return bahan; }
    public String getWarna() { return warna; }
    public String getUntuk() { return untuk; }
    public String getSize() { return size; }
    public String getMerk() { return merk; }
}