<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link rel="stylesheet" href="css/style-input.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Perhitungan Diskon</h1>
                <p>Masukkan detail harga dan diskon untuk menghitung harga akhir.</p>
            </div>
            <div class="card-body">
                <form action="proses.php" method="POST">
                    <div class="form-group">
                        <label for="harga">Harga Barang (Rp)</label>
                        <input type="number" id="harga" name="harga" placeholder="Contoh: 50000" required>
                    </div>
                    <div class="form-group">
                        <label for="diskon">Persentase Diskon (%)</label>
                        <input type="number" id="diskon" name="diskon" placeholder="Contoh: 15" required>
                    </div>
                    <button type="submit" class="btn-submit">Hitung Sekarang</button>
                </form>
            </div>
        </div>
        <footer class="footer">
            <p>&copy; 2025 Kalkulator Diskon.</p>
        </footer>
    </div>
</body>
</html>