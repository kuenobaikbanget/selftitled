<html>
    <head>
        <title>Ringkasan Pembayaran</title>
        <style>
            :root { 
                --bg:#f5f5f5; 
                --card:#fff; 
                --text:#111827; 
                --muted:#6b7280; 
                --primary:#2563eb; 
                --border:#e5e7eb; 
            }
            .btn:link, .btn:visited, .btn:hover, .btn:active { 
                text-decoration: none; 
            }

            * { box-sizing: border-box; }

            body { 
                margin:0; 
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Arial; 
                background:var(--bg); 
                color:var(--text); 
                line-height:1.5; 
                padding:24px; 
            }

            .container { 
                max-width:520px; 
                margin:0 auto; 
                background:var(--card); 
                border:1px solid var(--border); 
                border-radius:10px; 
                padding:20px 20px 24px; 
            }

            h1,h2,h3 { 
                margin:0 0 12px; 
                font-weight:600; 
            }

            .note { 
                color:var(--muted); 
                margin-bottom:16px; 
                font-size:14px; 
            }

            .row { 
                display:flex; 
                justify-content:space-between; 
                gap:10px; 
                padding:10px 0; 
                border-bottom:1px dashed var(--border); 
            }

            .row:last-child { 
                border-bottom:0; 
            }

            .total { 
                font-weight:700; 
                font-size:18px; 
            }
            ul { 
                margin:8px 0 0 18px; 
                padding:0; 
            }

            .section { 
                margin-top:8px; 
            }

            .actions { 
                margin-top:18px; 
                display:flex; 
                gap:10px; 
            }

            .btn { 
                display:inline-block; 
                padding:10px 14px; 
                border-radius:8px; 
                border:1px solid var(--border); 
                background:#fff; 
                color:#111827; 
                margin-top:18px;
                font-weight:600; 
                font-size:14px; 
            }

            .btn-primary { 
                background:var(--primary); 
                color:#fff; 
                border-color:transparent; 
            }
        </style>
    </head>
    <body>
        <?php
            include "config.php";
        

            function rupiah($angka) {
                return 'Rp ' . number_format((int)$angka, 0, ',', '.');
            }

            $nama = $_POST['nama'];
            $pilihan_menu = $_POST['menu'];
            $email = $_POST['email'];
            $subtotal = array_sum(array_map('intval', $pilihan_menu));
            $bonus = [];
            $diskon = 0;
            $total_harga = $subtotal;

            if ($subtotal >= 40000) {
                $diskon = (int)round($subtotal * 0.10);
                $total_harga = $subtotal - $diskon;
                $bonus[] = 'Minuman Gratis: Jus Jeruk';
            } elseif ($subtotal >= 20000) {
                $bonus[] = 'Minuman Gratis: Es Teh Manis';
            }
        
            $sql = "INSERT INTO transaksi (nama_pelanggan, email, total_bayar) VALUES ('$nama', '$email', '$total_harga')";
            if ($conn->query($sql) === FALSE) {
                echo "<p style='color:red'>Gagal menyimpan pesanan:" . $sql . "<br>" . $conn->error;
            }
        ?>

        <div class="container">
            <h3>Ringkasan Pembayaran</h3>
            <p class="note">Hi, <?php echo htmlspecialchars($nama); ?>. Berikut detail pesanan kamu.</p>

            <?php if ($diskon > 0): ?>
                <div class="row"><span>Subtotal Harga</span>
                    <span><?php echo rupiah($subtotal); ?></span>
                </div>
                <div class="row"><span>Diskon</span>
                    <span><?php echo rupiah($diskon); ?></span>
                </div>
                <div class="row"><span>Total Harga</span>
                    <span class="total"><?php echo rupiah($total_harga); ?></span>
                </div>
            <?php else: ?>
                <div class="row"><span>Total Harga</span>
                    <span class="total"><?php echo rupiah($subtotal); ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($bonus)): ?>
                <div class="section">
                    <strong>Bonus</strong>
                    <ul>
                        <?php foreach ($bonus as $b): ?>
                            <li><?php echo htmlspecialchars($b); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="actions">
                <a href="form_geprek.php" class="btn">Kembali</a>
                <form action="pembayaran.php" method="POST" style="margin: 0;">
                    <input type="hidden" name="total" value="<?php echo (int)($diskon > 0 ? $total_harga : $subtotal); ?>">
                    <input type="hidden" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                </form>
            </div>
        </div>
    </body>
</html>
