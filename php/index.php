<?php
require_once('PetShop.php');
require_once('Aksesoris.php');
require_once('Baju.php');

session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        new PetShop(1, "Dog Leash", 45000, 18, "Tali", "Nylon", "Biru", "Anjing", "L", "PetGo", "images/dog_leash.jpg"),
        new PetShop(2, "Cat Bed", 30000, 25, "Bantal", "Katun", "Abu-Abu", "Kucing", "M", "CozyPet", "images/cat_bed.jpg"),
        new Aksesoris(3, "Dog Collar", 35000, 10, "Kalung", "Kulit", "Hitam", "Anjing", "L", "PetGo", "images/dog_collar.jpg"),
        new Aksesoris(4, "Cat Harness", 40000, 12, "Tali", "Nylon", "Merah", "Kucing", "S", "CatWalk", "images/cat_harness.jpg"),
        new Baju(5, "Dog Sweater", 75000, 8, "Pakaian", "Wol", "Biru", "Anjing", "M", "PetFashion", "images/dog_sweater.jpg"),
    ];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add_product' && isset($_POST['tipe'])) {
            $tipe = $_POST['tipe'];
            $id = (int)$_POST['id'];
            $nama = $_POST['nama'];
            $harga = (float)$_POST['harga'];
            $stok = (int)$_POST['stok'];
            $jenis = $_POST['jenis'];
            $bahan = $_POST['bahan'];
            $warna = $_POST['warna'];
            $untuk = $_POST['untuk'];
            $size = $_POST['size'];
            $merk = $_POST['merk'];
            
            $foto_produk = "";
            if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] == 0) {
                
                if (!file_exists('images')) {
                    mkdir('images', 0777, true);
                }
                
                $file_extension = pathinfo($_FILES['foto_produk']['name'], PATHINFO_EXTENSION);
                $file_name = 'product_' . time() . '_' . rand(1000, 9999) . '.' . $file_extension;
                $target_path = 'images/' . $file_name;
                
                if (move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_path)) {
                    $foto_produk = $target_path;
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengupload gambar!</div>";
                    $foto_produk = 'images/default.jpg'; 
                }
            } else if (!empty($_POST['foto_produk_url'])) {
                $foto_produk = $_POST['foto_produk_url'];
                
                if (strpos($foto_produk, 'http') !== 0 && strpos($foto_produk, 'images/') !== 0) {
                    $foto_produk = 'images/' . $foto_produk;
                }
            } else {
                $foto_produk = 'images/default.jpg'; 
            }

            if ($tipe == 1) {
                $_SESSION['products'][] = new PetShop($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk);
            } else if ($tipe == 2) {
                $_SESSION['products'][] = new Aksesoris($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk);
            } else if ($tipe == 3) {
                $_SESSION['products'][] = new Baju($id, $nama, $harga, $stok, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk);
            }
            
            echo "<div class='alert alert-success'>Produk berhasil ditambahkan!</div>";
        }
    }
}

function displayProducts($products) {
    if (empty($products)) {
        echo "<p>Tidak ada produk dalam daftar.</p>";
        return;
    }

    echo "<h2>INFORMASI PRODUK PETSHOP LENGKAP</h2>";
    
    echo "<div class='table-container'>";
    echo "<table class='product-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nama Produk</th>";
    echo "<th>Harga</th>";
    echo "<th>Stok</th>";
    echo "<th>Jenis</th>";
    echo "<th>Bahan</th>";
    echo "<th>Warna</th>";
    echo "<th>Untuk</th>";
    echo "<th>Size</th>";
    echo "<th>Merk</th>";
    echo "<th>Foto</th>";
    echo "</tr>";
    echo "</thead>";
    
    echo "<tbody>";
    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . $product->getId() . "</td>";
        echo "<td>" . $product->getNama() . "</td>";
        echo "<td>Rp " . number_format($product->getHarga(), 2) . "</td>";
        echo "<td>" . $product->getStok() . "</td>";
        echo "<td>" . $product->getJenis() . "</td>";
        echo "<td>" . $product->getBahan() . "</td>";
        echo "<td>" . $product->getWarna() . "</td>";
        echo "<td>" . $product->getUntuk() . "</td>";
        echo "<td>" . $product->getSize() . "</td>";
        echo "<td>" . $product->getMerk() . "</td>";
        
        $imgPath = $product->getFotoProduk();
        echo "<td>";
        if (strpos($imgPath, 'http') === 0) {
            echo "<img src='" . $imgPath . "' alt='" . $product->getNama() . "' class='product-thumbnail'>";
        } 
        
        else {
            echo "<img src='" . $imgPath . "' alt='" . $product->getNama() . "' class='product-thumbnail'>";
        }
        echo "</td>";
        
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}


function getModalScript() {
    return <<<'EOT'
    <script>
        // Get the modal
        var modal = document.getElementById("addProductModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("addProductBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
        // Show appropriate input field based on selection
        document.getElementById('upload_type').addEventListener('change', function() {
            var uploadField = document.getElementById('upload_field');
            var urlField = document.getElementById('url_field');
            
            if (this.value === 'upload') {
                uploadField.style.display = 'block';
                urlField.style.display = 'none';
            } else {
                uploadField.style.display = 'none';
                urlField.style.display = 'block';
            }
        });
    </script>
EOT;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem PetShop</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        body {
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1, h2, h3 {
            margin-bottom: 20px;
            color: #333;
        }
        
        h1 {
            font-size: 28px;
            border-bottom: 2px solid #666;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        
        h2 {
            font-size: 24px;
            color: #444;
        }
        
        h3 {
            font-size: 20px;
        }
        
        
        .table-container {
            overflow-x: auto;
            margin-bottom: 30px;
        }
        
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            text-align: left;
        }
        
        .product-table th, .product-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        
        .product-table thead {
            background-color: #3498db;
            color: white;
        }
        
        .product-table th {
            font-weight: bold;
        }
        
        .product-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .product-table tbody tr:hover {
            background-color: #e6f3ff;
        }
        
        .product-thumbnail {
            max-width: 100px;
            height: 80px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .button:hover {
            background-color: #2980b9;
        }
        
        .menu-container {
            margin: 20px 0;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .modal-header {
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            position: relative;
        }
        
        .close {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            cursor: pointer;
        }
        
        .close:hover {
            color: #333;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .form-control:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        
        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
        }
        
        .form-text {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: #666;
        }
        
        .btn-submit {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-submit:hover {
            background-color: #2980b9;
        }
        
       
        .upload-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 5px;
            display: none;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        
        @media screen and (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .product-table th, .product-table td {
                padding: 8px;
            }
            
            .modal-content {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem PetShop</h1>
        
        <?php 
        displayProducts($_SESSION['products']); 
        ?>

        <div class="menu-container">
            <h3>MENU SISTEM PETSHOP</h3>
            <div>
                <button id="addProductBtn" class="button">Tambah Produk Baru</button>
            </div>
        </div>

        <!-- Add Product Modal -->
        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Tambah Produk Baru</h3>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_product">
                        
                        <div class="form-group">
                            <label for="tipe" class="form-label">Tipe Produk</label>
                            <select class="form-select" id="tipe" name="tipe" required>
                                <option value="1">PetShop</option>
                                <option value="2">Aksesoris</option>
                                <option value="3">Baju</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="id" class="form-label">ID</label>
                            <input type="number" class="form-control" id="id" name="id" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="jenis" class="form-label">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="bahan" class="form-label">Bahan</label>
                            <input type="text" class="form-control" id="bahan" name="bahan" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="untuk" class="form-label">Untuk</label>
                            <input type="text" class="form-control" id="untuk" name="untuk" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="size" class="form-label">Size</label>
                            <input type="text" class="form-control" id="size" name="size" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Metode Input Foto</label>
                            <select class="form-select" id="upload_type" name="upload_type">
                                <option value="upload">Upload File</option>
                                <option value="url">Masukkan URL/Nama File</option>
                            </select>
                        </div>
                        
                        <div class="form-group" id="upload_field">
                            <label for="foto_produk" class="form-label">Upload Foto Produk</label>
                            <input type="file" class="form-control" id="foto_produk" name="foto_produk" accept="image/*">
                            <span class="form-text">Pilih file gambar (JPG, PNG, GIF)</span>
                            <img id="preview" class="upload-preview">
                        </div>
                        
                        <div class="form-group" id="url_field" style="display: none;">
                            <label for="foto_produk_url" class="form-label">URL/Nama File Foto Produk</label>
                            <input type="text" class="form-control" id="foto_produk_url" name="foto_produk_url">
                            <span class="form-text">Masukkan nama file (contoh: product.jpg) atau URL lengkap untuk gambar.</span>
                        </div>
                        
                        <button type="submit" class="btn-submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo getModalScript(); ?>
    
    <script>
        document.getElementById('foto_produk').addEventListener('change', function(e) {
            var preview = document.getElementById('preview');
            preview.style.display = 'block';
            
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>
</html>