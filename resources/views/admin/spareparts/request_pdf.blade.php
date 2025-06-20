<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Pengajuan Pembelian Suku Cadang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .info-table,
        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 4px;
        }

        .item-table th,
        .item-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">Formulir Pengajuan Pembelian Suku Cadang</div>
        <div>Nomor: {{ $request->id }}/SPC/{{ now()->year }}</div>
        <div>Tanggal: {{ $request->created_at->format('d-m-Y') }}</div>
    </div>

    <table class="info-table">
        <tr>
            <td><strong>Nama Pengaju</strong></td>
            <td>: {{ $request->requestedBy->name }}</td>
        </tr>
        <tr>
            <td><strong>Barang Diajukan</strong></td>
            <td>: {{ $request->sparepart->name }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah</strong></td>
            <td>: {{ $request->quantity }} {{ $request->sparepart->unit }}</td>
        </tr>
        <tr>
            <td><strong>Spesifikasi</strong></td>
            <td>: {{ $request->sparepart->specification }}</td>
        </tr>
        <tr>
            <td><strong>Supplier</strong></td>
            <td>: {{ $request->sparepart->supplier ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Keterangan</strong></td>
            <td>: {{ $request->description ?? '-' }}</td>
        </tr>
    </table>

    <div class="footer">
        Hormat kami,<br><br><br>
        <strong>{{ $request->requestedBy->name }}</strong><br>
        {{ ucfirst($request->requestedBy->role) }}
    </div>
</body>

</html>