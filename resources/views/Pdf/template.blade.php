<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Sekolah dan Penilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        td {
            padding: 8px;
            border: 1px solid #000;
            vertical-align: top;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
        }
        .header h2 {
            font-size: 16px;
            margin: 5px 0;
        }
        .label {
            width: 30%;
        }
        .section-title {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ $image_path }}" alt="Logo">
        <h1>PROFILE GURU</h1>
        <h2>TAHUN PENILAIAN {{ $tahun_penilaian }}</h2>
    </div>

    <table>
        <tr>
            <td class="label">Nama</td>
            <td>{{ $dataGuru->name }}</td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td>{{ $dataGuru->nik }}</td>
        </tr>
        <tr>
            <td class="label">Tempat, Tanggal Lahir</td>
            <td>{{ $dataGuru->ttl }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td>{{ $dataGuru->jenisKelamin }}</td>
        </tr>
        <tr>
            <td class="label">Pendidikan Terakhir</td>
            <td>{{ $dataGuru->pendidikan }}</td>
        </tr>
        <tr>
            <td class="label">Mata Pelajaran yang diampu</td>
            <td>{{ $dataGuru->guruMapel }}</td>
        </tr>
    </table>

</body>
</html>
