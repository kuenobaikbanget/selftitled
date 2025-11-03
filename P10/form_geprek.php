<html>
    <head>
        <title>Pemesanan Geprek Bucin</title>
        <style>
            :root {
                --bg: #f5f5f5;
                --card: #ffffff;
                --text: #111827;
                --muted: #6b7280;
                --primary: #2563eb;
                --border: #e5e7eb;
            }
            * { box-sizing: border-box; }
            body {
                margin: 0;
                font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Arial, "Apple Color Emoji", "Segoe UI Emoji";
                background: var(--bg);
                color: var(--text);
                line-height: 1.5;
                padding: 24px;
            }
            .container {
                max-width: 520px;
                margin: 0 auto;
                background: var(--card);
                border: 1px solid var(--border);
                border-radius: 10px;
                padding: 20px 20px 24px;
            }
            h1, h2, h3 {
                margin: 0 0 14px;
                font-weight: 600;
            }
            .subtitle { 
                color: var(--muted); 
                margin-bottom: 18px; 
                font-size: 14px; 
            }
            
            .menu-list { 
                display: grid; 
                gap: 10px; 
                margin: 14px 0 18px; 
            }
            
            .menu-item { 
                display: flex; 
                align-items: center; 
                gap: 10px; 
                padding: 8px 10px; 
                border: 1px solid var(--border); 
                border-radius: 8px; 
            }
            
            .menu-item label { 
                flex: 1; cursor: pointer; 
            }
            
            .field { 
                display: grid; 
                gap: 6px; 
                margin: 6px 0 14px; 
            }
            
            .field input[type="text"] {
                padding: 10px 12px;
                border: 1px solid var(--border);
                border-radius: 8px;
                font-size: 14px;
                width: 100%;
            }
            .actions { margin-top: 6px; }
            
            .btn-primary {
                display: inline-block;
                padding: 10px 14px;
                border-radius: 8px;
                background: var(--primary);
                color: #fff;
                border: 1px solid transparent;
                font-weight: 600;
                font-size: 14px;
                cursor: pointer;
            }
            small.note { color: var(--muted); }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Daftar Menu di Kantin Bu Cindy</h3>
            <p class="subtitle">Pilih menu yang kamu mau pesan, lalu isi nama untuk pemesanan.</p>
            <form action="proses_geprek.php" method="POST">
                <div class="menu-list">
                    <div class="menu-item">
                        <input id="nasi_geprek" type="checkbox" name="menu[]" value="15000" />
                        <label for="nasi_geprek">Nasi Ayam Geprek — Rp 15.000</label>
                    </div>
                    <div class="menu-item">
                        <input id="nasi_ijo" type="checkbox" name="menu[]" value="15000" />
                        <label for="nasi_ijo">Nasi Ayam Geprek cabe Ijo — Rp 15.000</label>
                    </div>
                    <div class="menu-item">
                        <input id="nasi_teriyaki" type="checkbox" name="menu[]" value="15000" />
                        <label for="nasi_teriyaki">Nasi Ayam Teriyaki — Rp 15.000</label>
                    </div>
                    <div class="menu-item">
                        <input id="indomie-geprek" type="checkbox" name="menu[]" value="18000" />
                        <label for="indomie-geprek">Indomie Ayam Geprek — Rp 18.000</label>
                    </div>
                    <div class="menu-item">
                        <input id="Indomie-ijo" type="checkbox" name="menu[]" value=18000" />
                        <label for="Indomie-ijo">Indomie Ayam Geprek cabe Ijo — Rp 18.000</label>
                    </div>
                </div>

                <div class="field">
                    <label for="nama">Nama Anda</label>
                    <input id="nama" type="text" name="nama" placeholder="Misal: Verstappen" />
                </div>

                <div class="actions">
                    <button class="btn-primary" type="submit">Bayar Sekarang</button>
                </div>
            </form>
        </div>
    </body>
</html>