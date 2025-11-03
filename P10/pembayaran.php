<html>
    <head>
        <title>Pembayaran - Ayam Geprek Bu Cindy</title>
        <style>
            :root {
                --bg:#f5f5f5; 
                --card:#fff; 
                --text:#111827; 
                --muted:#6b7280; 
                --primary:#2563eb; 
                --border:#e5e7eb;
            } 

            * { box-sizing: border-box; }

            body { 
                margin:0; 
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, 
                Arial; background:var(--bg); 
                color:var(--text); 
                line-height:1.5; 
                padding:24px; 
            }
            
            .container { 
                max-width:560px; 
                margin:0 auto; 
                background:var(--card); 
                border:1px solid var(--border); 
                border-radius:12px; 
                padding:22px 22px 26px; 
            }

            h1,h2,h3 { 
                margin:0 0 12px; 
                font-weight:700; 
            }

            .muted { 
                color:var(--muted);
                font-size:14px; 
            }

            .header {
                text-align: center; 
            }

            .nama-merchant {
                font-size: 25px;
                font-weight: 700;
                margin-top: 4px;
                text-align: center; 
            }

            .merchant { 
                font-size:18px; 
                font-weight:700; 
            }

            .total { 
                font-size:20px; 
                font-weight:800; 
                letter-spacing:0.3px; 
            }

            .row { 
                display:flex; 
                justify-content:space-between; 
                gap:10px; 
                padding:10px 0; 
            }

            .row:last-child { 
                border-bottom:0; 
            }

            .qris { 
                display:grid; 
                place-items:center; 
                padding:18px; 
                border:1px solid var(--border); 
                border-radius:10px; 
                background:#fff; 
            }

            .qris img { 
                width:240px; 
                height:240px; 
                object-fit:contain; 
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
                font-weight:600; 
                font-size:14px; 
            }

            .btn-primary { 
                background:var(--primary); 
                color:#fff; 
                border-color:transparent; 
            }

            .btn:link { 
                text-decoration: none; 
            }

            .help { 
                margin-top:10px; 
                font-size:13px; 
                color:var(--muted); 
            }
        </style>
    </head>
    <body>
        <?php
        function rupiah($angka) { return 'Rp ' . number_format((int)$angka, 0, ',', '.'); }

        $total = isset($_GET['total']) ? (int)$_GET['total'] : 0;
        $nama = isset($_GET['nama']) && $_GET['nama'] !== '' ? $_GET['nama'] : 'Pelanggan';
        $merchant = 'Ayam Geprek Bu Cindy';
        ?>

        <div class="container">
        <div class="header">
            <div class="merchant">Pembayaran dengan QRIS</div>
            <div class="nama-merchant"><?php echo htmlspecialchars($merchant); ?></div>
        </div>

        <div class="row" style="margin-top:15px;">
            <span class="total">Total yang harus dibayar</span>
            <span class="total"><?php echo rupiah($total); ?></span>
        </div>

        <div class="qris" style="margin-top:16px;">
            <img src="https://images.seeklogo.com/logo-png/21/1/qr-code-logo-png_seeklogo-217342.png" alt="QRIS Code" />
        </div>

        <p class="help">Scan Kode QR di atas ini dengan aplikasi digital wallet / m-banking untuk melakukan pembayar.</p>

        <div class="actions">
            <a class="btn" href="proses_geprek.php">Kembali</a>
            <a class="btn btn-primary" href="form_geprek.php">Selesai</a>
        </div>
        </div>
    </body>
</html>
