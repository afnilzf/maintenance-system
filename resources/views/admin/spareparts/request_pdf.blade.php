<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Permintaan Sparepart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
            padding-bottom: 0px;
        }

        .header img {
            width: 120px;
            height: auto;
        }

        .title {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 50px;
            padding-top: 20px;
            /* border: 1px solid #000; */
            /* box-sizing: border-box; */
        }

        .info-table {
            /* margin-bottom: 20px; */
            margin: 50px;
        }

        .info-table td {
            padding: 5px 10px;
        }


        .info-table td:last-child {
            padding-left: 30px;
        }

        .sparepart-table {
            width: 90%;
            border-collapse: collapse;
            /* margin-bottom: 30px; */
            margin: 30px auto;
        }

        .sparepart-table th,
        .sparepart-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .signature-section {
            width: 100%;
            margin-top: 50px;
        }

        .signature-section td {
            vertical-align: top;
            padding: 20px;
        }

        .signature-block {
            text-align: center;
        }

        .signature-space {
            height: 60px;
        }
    </style>
</head>

<body>

    <!-- HEADER (logo + title) -->
    <div class="header">
        <img src="{{ asset('theme/images/polman.png') }}" alt="Logo">

    </div>

    <!-- FORM CONTAINER -->
    <div class="container">
        <div class="title">FORM PERMINTAAN SPAREPART</div>
        <table class="info-table">
            <tr>
                <td><strong>Tanggal</strong> :</td>
                <td>{{ \Carbon\Carbon::parse($request->created_at)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td><strong>Sektor</strong> :</td>
                <td>{{ $request->requester->sektor ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>Kode Mesin</strong> :</td>
                <td>{{ $request->sparepart->machine_code ?? '-' }}</td>
            </tr>
        </table>

        <table class="sparepart-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Barang</th>
                    <th width="10%">Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $request->sparepart->name }}</td>
                    <td>{{ $request->quantity }}</td>
                    <td>{{ $request->description }}</td>
                </tr>
            </tbody>
        </table>

        <table class="signature-section">
            <tr>
                <td class="signature-block">
                    Dibuat oleh,<br>
                    PLP Perawatan<br><br><br><br><br>
                    <div class="signature-space"></div>
                    ({{ $request->requester->name ?? '-' }}, NIP ______________)
                </td>
                <td class="signature-block">
                    Mengetahui,<br>
                    Ketua Jurusan<br>
                    Rekayasa Mesin<br><br><br><br>
                    <div class="signature-space"></div>
                    (Abdul Budi, NIP ______________)
                </td>
            </tr>
        </table>
    </div>

</body>

</html>