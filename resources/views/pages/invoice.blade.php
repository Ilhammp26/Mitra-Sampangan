<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $booking->invoice_code }} - Mitra Sampangan</title>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .company-details h1 {
            margin: 0;
            font-size: 24px;
            color: #2c3e50;
        }

        .company-details p {
            margin: 5px 0 0;
            color: #7f8c8d;
            font-size: 14px;
        }

        .invoice-details {
            text-align: right;
        }

        .invoice-details h2 {
            margin: 0;
            color: #2c3e50;
        }

        .status-badge {
            display: inline-block;
            background: #2ecc71;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 10px;
            font-size: 0.9em;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .info-group h3 {
            margin: 0 0 10px;
            font-size: 16px;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-group p {
            margin: 0;
            font-weight: 500;
            font-size: 16px;
        }

        .table-container {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            color: #2c3e50;
            font-weight: 600;
        }

        .total-row td {
            font-weight: bold;
            font-size: 18px;
            border-top: 2px solid #2c3e50;
            border-end-start-radius: 0;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            border-top: 1px solid #eee;
            padding-top: 20px;
            color: #95a5a6;
            font-size: 13px;
        }

        @media print {
            body {
                max-width: 100%;
                padding: 0;
            }

            .no-print {
                display: none;
            }
        }

        .btn-print {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-back {
            background: #95a5a6;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
            margin-right: 10px;
        }
    </style>
</head>

@php
$startTime = \Carbon\Carbon::parse($booking->jam_mulai);
$endTime = \Carbon\Carbon::parse($booking->jam_selesai);
$duration = $startTime->diffInHours($endTime);
@endphp

<body>
    <div class="no-print">
        <a href="{{ route('pel.pesanan') }}" class="btn-back">← Kembali</a>
        <button onclick="window.print()" class="btn-print">Cetak Invoice</button>
    </div>

    <div class="invoice-header">
        <div class="company-details">
            <h1>Mitra Sampangan Sport Center</h1>
            <p>Jl. Menoreh Tengah X No.23, Sampangan<br>Kec. Gajahmungkur, Kota Semarang<br>Jawa Tengah 50232</p>
        </div>
        <div class="invoice-details">
            <h2>INVOICE</h2>
            <p>#{{ $booking->invoice_code }}</p>
            <div class="status-badge">LUNAS</div>
        </div>
    </div>

    <div class="info-grid">
        <div class="info-group">
            <h3>Ditagihkan Kepada:</h3>
            <p>{{ $booking->user->name }}</p>
            <p>{{ $booking->user->email }}</p>
            <p>{{ $booking->user->no_wa ?? '-' }}</p>
        </div>
        <div class="info-group">
            <h3>Detail Pesanan:</h3>
            <p>Tanggal: {{ $booking->tanggal->format('d F Y') }}</p>
            <p>Waktu: {{ $startTime->format('H:i') }} - {{ $endTime->format('H:i') }} WIB</p>
            <p>Durasi: {{ $duration }} Jam</p>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Harga/Jam</th>
                    <th>Qty (Jam)</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sewa Lapangan Futsal</td>
                    <td>Rp {{ number_format($booking->harga / max($duration, 1), 0, ',', '.') }}</td>
                    <td>{{ $duration }}</td>
                    <td style="text-align: right;">Rp {{ number_format($booking->harga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="3" style="text-align: right;">Grand Total</td>
                    <td style="text-align: right;">Rp {{ number_format($booking->jumlah_bayar, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="info-group">
        <h3>Metode Pembayaran:</h3>
        <p style="text-transform: capitalize;">{{ str_replace('_', ' ', $booking->tipe_pembayaran) }}</p>
    </div>

    <div class="footer">
        <p>Terima kasih telah bermain di Mitra Sampangan Sport Center!</p>
        <p>Simpan bukti pembayaran ini sebagai tiket masuk.</p>
    </div>
</body>

</html>