<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Data Produk</h1>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'pemrograman_web');
        $q = '';
        if (isset($_GET['q']))
            $q = $_GET['q'];
        $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama_produk LIKE '%$q%'");
        ?>
        <div class="card">
            <div class="card-header">
                <form class="row row-cols-auto g-1">
                    <div class="col">
                    <input class="form-control" type="text" name="q" placeholder="Pencarian..." />
                    </div>
                    <div class="col">
                        <button class="btn btn-success">Cari</button>
                    </div>
                    <div class="col">
                        <a class='btn btn-primary' href="produk_tambah.php">Tambah</a>
                    </div>
                </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_object($query)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_produk ?></td>
                        <td><?= $row->harga_beli ?></td>
                        <td><?= $row->harga_jual ?></td>
                        <td><?= $row->stok ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="produk_ubah.php?id_produk=<?=
                            $row->id_produk ?>">Ubah</a>
                            <a class="btn btn-sm btn-danger" href="produk_hapus.php?id_produk=<?= $row->id_produk ?>"
                            onclick="return confirm ('Hapus Data')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>

    
</html>
<!--produk--!>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'pemrograman_web');
echo "Koneksi Berhasil";
[13/05/2024 14:51] : koneksi.php
  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Tambah Produk</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="produk_simpan.php">
                    <div class="mb-3">
                        <label>Nama </label>
                        <input class="form-control" type="text" name="nama_produk" />
                    </div>
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input class="form-control" type="number" name="harga_beli" />
                    </div>
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input class="form-control" type="number" name="harga_jual" />
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" type="number" name="stok" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="produk.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
[13/05/2024 14:52] : produk_tambah

  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Ubah Produk</h1>
        <?php
        $conn = mysqli_connect('localhost','root','','pemrograman_web');
        $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk='$_GET[id_produk]'"); 
        $row = mysqli_fetch_object($query);
        ?>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="produk_update.php?id_produk=<?= $row->id_produk ?>">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama_produk" value="<?=$row->nama_produk ?>" />
                    </div>
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input class="form-control" type="number" name="harga_beli" value="<?=$row->harga_beli ?>"/>
                    </div>
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input class="form-control" type="number" name="harga_jual" value="<?=$row->harga_jual ?>"/>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" type="number" name="stok" value="<?=$row->stok ?>"/>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-danger" href="produk.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
[13/05/2024 14:53] : produk_ubah
      
<?php
$conn = mysqli_connect('localhost', 'root', '', 'pemrograman_web');
$id_produk = $_GET['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];
$query = mysqli_query($conn, "UPDATE tb_produk SET nama_produk='$nama_produk',
harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok' WHERE
id_produk='$id_produk'");
header("location:produk.php");
[13/05/2024 14:53] : produk_update
  
<?php
$conn = mysqli_connect('localhost', 'root', '', 'pemrograman_web');
$nama_produk = $_POST['nama_produk'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];
$query = mysqli_query($conn, "INSERT INTO tb_produk (nama_produk, harga_beli, harga_jual,
stok) VALUES ('$nama_produk', '$harga_beli', '$harga_jual', '$stok')");
header("location: produk.php");
[13/05/2024 14:54] : produk_simpan
  
<?php
$conn = mysqli_connect('localhost', 'root', '', 'pemrograman_web');
$id_produk = $_GET['id_produk'];
$query = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk='$id_produk'");
header("location:produk.php");
[13/05/2024 14:55] : produk_hapus
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data Kategori</h1>
    <?php
    $conn = mysqli_connect('localhost','root','','pemrograman_web');
    $query = mysqli_query($conn, "SELECT * FROM tb_kategori");
    ?>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_object($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->nama_kategori ?></td>
            </tr>
        <?php endwhile ?>
    </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
[13/05/2024 14:55] : kategori
