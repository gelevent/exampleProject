<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgb(101, 181, 232);
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        .no-border {
            border: none;
        }
    </style>
</head>

<body>
    <h2>HASIL PENILAIAN KINERJA GURU MATA PELAJARAN</h2>
    <p>Nama: {{ $performance->teacher_name }}</p>
    <p>Nama Penilai:{{ $performance->evaluator_name }} </p>

    <table>
        <thead>
            <tr>
                <th colspan="2">Kompetensi 1: Mengenal Karakteristik Peserta Didik</th>
                <th colspan="3">Skor</th>
                <th>SKOR</th>
            </tr>
            <tr>
                <th>Indikator</th>
                <th>Penilaian untuk Kompetensi 1: Mengenal karakteristik peserta didik</th>
                <th>Tidak ada</th>
                <th>Terpenuhi sebagian</th>
                <th>Seluruhnya terpenuhi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya.</td>
                <td>{{ $performance->penilaian_1 == 0 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_1 == 1 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_1 == 2 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_1 }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Guru memastikan bahwa semua peserta didik mendapat kesempatan yang sama untuk berpartisipasi aktif
                    dalam kegiatan pembelajaran.</td>
                <td>{{ $performance->penilaian_2 == 0 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_2 == 1 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_2 == 2 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_2 }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik
                    dengan kelainan fisik dan kemampuan belajar yang berbeda.</td>
                <td>{{ $performance->penilaian_3 == 0 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_3 == 1 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_3 == 2 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_3 }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Guru mencoba mengubah penyebab pengimpangan perilaku peserta didik dan mengatur agar perilaku
                    tersebut tidak mengganggu aktivitas belajar peserta didik lain.</td>
                <td>{{ $performance->penilaian_4 == 0 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_4 == 1 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_4 == 2 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_4 }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Guru mengidentifikasi penyebab dan mengatasi gangguan kesehatan peserta didik.</td>
                <td>{{ $performance->penilaian_5 == 0 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_5 == 1 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_5 == 2 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_5 }}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Guru dapat memperhatikan peserta didik dengan kelainan fisik tertentu agar tetap nyaman dalam
                    mengikuti proses pembelajaran (misalnya: duduk, olah raga, kerja di laboratorium, dan sebagainya).
                </td>
                <td>{{ $performance->penilaian_6 == 0 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_6 == 1 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_6 == 2 ? "v" : '' }}</td>
                <td>{{ $performance->penilaian_6 }}</td>
            </tr>
            <tr>
                <td colspan="5" class="no-border">Total skor untuk kompetensi 1</td>
                <td>{{ $performance->penilaian_1 + $performance->penilaian_2 + $performance->penilaian_3 + $performance->penilaian_4 + $performance->penilaian_5 + $performance->penilaian_6 }}
                </td>
            </tr>
        </tbody>
    </table>

    <p>Skor maksimal untuk kompetensi 1 = jumlah indikator x 2 = 12</p>
    <p>Persentase = (total skor/12) x 100% =
        {{ round(
            (($performance->penilaian_1 +
                $performance->penilaian_2 +
                $performance->penilaian_3 +
                $performance->penilaian_4 +
                $performance->penilaian_5 +
                $performance->penilaian_6) /
                12) *
                100,
            2,
        ) }}%

    </p>
</body>

</html>
