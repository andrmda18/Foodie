<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Koin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            font-family: 'Segoe UI', sans-serif;
        }

        .card-custom {
            border-radius: 20px;
            border: none;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: #4caf50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-secondary:hover {
            background-color: #6c757d;
        }

        h1 {
            font-weight: 600;
        }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <h1 class="text-center mb-5">Top Up Koin</h1>

        <form action="{{ route('koin.topup.proses') }}" method="POST" enctype="multipart/form-data" class="card card-custom p-4 mx-auto" style="max-width: 500px;">
            @csrf
            <div class="text-center mb-4">
                <img src="{{ asset('qr-code.png') }}" alt="QR Code" class="img-fluid" width="200">
                <p class="text-muted mt-2">Scan QR untuk melakukan pembayaran</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Koin</label>
                <select name="jumlah" class="form-select" required>
                    <option value="">-- Pilih Jumlah --</option>
                    <option value="10">10 Koin</option>
                    <option value="20">20 Koin</option>
                    <option value="30">30 Koin</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" accept="image/*" class="form-control" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Bayar</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>