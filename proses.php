<?php
// proses.php
session_start();

// Fungsi untuk memformat angka menjadi format Rupiah
function format_rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga = filter_input(INPUT_POST, 'harga', FILTER_VALIDATE_FLOAT);
    $diskon = filter_input(INPUT_POST, 'diskon', FILTER_VALIDATE_FLOAT);

    $error_message = '';

    // Validasi Input
    if ($harga === false || $diskon === false) {
        $error_message = 'Input yang Anda masukkan tidak valid. Harap masukkan angka.';
    } elseif ($harga <= 0) {
        $error_message = 'Harga barang harus lebih besar dari 0.';
    } elseif ($diskon < 0 || $diskon > 100) {
        $error_message = 'Persentase diskon harus di antara 0 dan 100.';
    }

    $result_data = [];

    if (!empty($error_message)) {
        // Jika ada error, siapkan data error untuk ditampilkan
        $result_data = [
            'status' => 'error',
            'message' => $error_message
        ];
    } else {
        // Jika valid, lakukan perhitungan
        $nilai_diskon = $harga * ($diskon / 100);
        $harga_akhir = $harga - $nilai_diskon;

        // Siapkan data hasil dalam bentuk array (mirip struktur JSON)
        $result_data = [
            'status' => 'success',
            'harga_asli' => format_rupiah($harga),
            'persen_diskon' => $diskon . '%',
            'nilai_diskon' => format_rupiah($nilai_diskon),
            'harga_akhir' => format_rupiah($harga_akhir)
        ];
    }

    // Simpan data hasil ke dalam session
    $_SESSION['result_data'] = $result_data;

    // Arahkan ke halaman hasil
    header("Location: hasil.php");
    exit();
}
?>