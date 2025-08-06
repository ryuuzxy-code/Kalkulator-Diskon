<?php
session_start();

// Ambil data dari session, jika tidak ada, arahkan kembali ke index
if (!isset($_SESSION['result_data'])) {
    header("Location: index.php");
    exit();
}

$result = $_SESSION['result_data'];

// Hapus data dari session setelah ditampilkan
unset($_SESSION['result_data']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Diskon</title>
    <link rel="stylesheet" href="css/style-hasil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="result-card <?php echo $result['status']; ?>">
            <?php if ($result['status'] == 'success'): ?>
                <div class="result-header">
                    <h2>Perhitungan Berhasil!</h2>
                </div>
                <div class="result-body">
                    <div class="result-item">
                        <span>Harga Asli</span>
                        <p><?php echo htmlspecialchars($result['harga_asli']); ?></p>
                    </div>
                    <div class="result-item">
                        <span>Diskon</span>
                        <p><?php echo htmlspecialchars($result['persen_diskon']); ?></p>
                    </div>
                    <div class="result-item highlight">
                        <span>Potongan Harga</span>
                        <p><?php echo htmlspecialchars($result['nilai_diskon']); ?></p>
                    </div>
                    <hr>
                    <div class="final-price">
                        <span>Total yang Harus Dibayar</span>
                        <h3><?php echo htmlspecialchars($result['harga_akhir']); ?></h3>
                    </div>
                </div>
            <?php else: ?>
                <div class="result-header error">
                    <h2>Terjadi Kesalahan!</h2>
                </div>
                <div class="result-body">
                    <p class="error-message"><?php echo htmlspecialchars($result['message']); ?></p>
                </div>
            <?php endif; ?>

            <div class="result-footer">
                <a href="index.php" class="btn-back">Hitung Lagi</a>
            </div>
        </div>
    </div>
</body>

</html>
