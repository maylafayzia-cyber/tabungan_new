<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga = (float)$_POST['harga'];
    $jumlah = (int)$_POST['jumlah'];
    $diskon = (float)$_POST['diskon'];
    
    $total = $harga * $jumlah;
    $potongan = $total * ($diskon / 100);
    $bayar = $total - $potongan;
    
    $hasil = "
    <div class='result'>
        <h3>📋 Ringkasan Pesanan</h3>
        <p>Harga Satuan: Rp " . number_format($harga, 0, ',', '.') . "</p>
        <p>Jumlah Beli: $jumlah</p>
        <p>Subtotal: <strong>Rp " . number_format($total, 0, ',', '.') . "</strong></p>
        <p>Diskon ($diskon%): -Rp " . number_format($potongan, 0, ',', '.') . "</p>
        <hr>
        <p class='total'><strong>TOTAL BAYAR: Rp " . number_format($bayar, 0, ',', '.') . "</strong></p>
    </div>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Belanja</title>
    <style>
        * {box-sizing: border-box; font-family: Arial, sans-serif;}
        body {background: #f5f5f5; max-width: 420px; margin: 30px auto; padding: 20px;}
        .card {background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h2 {text-align: center; color: #ee4d2d; margin-top: 0;}
        label {display: block; margin: 12px 0 5px; font-weight: 600; font-size: 14px;}
        input {width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;}
        button {width: 100%; background: #ee4d2d; color: white; border: none; padding: 12px; border-radius: 6px; font-size: 16px; font-weight: bold; margin-top: 20px; cursor: pointer;}
        button:hover {background: #d93f20;}
        .result {margin-top: 20px; padding: 15px; background: #fff5f2; border-radius: 8px; border-left: 4px solid #ee4d2d;}
        .result p {margin: 8px 0; font-size: 15px;}
        .total {font-size: 18px !important; color: #ee4d2d;}
    </style>
</head>
<body>
    <div class="card">
        <h2>🛒 Kalkulator Belanja</h2>
        <form method="post" action="">
            <label>Harga Barang (Rp)</label>
            <input type="number" name="harga" required step="1" placeholder="Contoh: 50000">
            
            <label>Jumlah Beli</label>
            <input type="number" name="jumlah" required min="1" placeholder="Contoh: 3">
            
            <label>Diskon (%)</label>
            <input type="number" name="diskon" value="0" min="0" max="100" placeholder="0 jika tidak ada diskon">
            
            <button type="submit">HITUNG TOTAL</button>
        </form>
        <?php echo $hasil; ?>
    </div>
</body>
</html>
