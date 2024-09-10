<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
        }

        h1,
        h2 {
            color: #343a40;
            font-weight: 600;
        }

        .table thead th {
            background-color: #006BB8;
            color: #fff;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid col-md-10">
            <a class="navbar-brand" href="/">
                <img src="https://res.cloudinary.com/dhyq9uts4/image/upload/v1676360444/logo_v09np1.png" alt="Logo"
                    height="45" class="d-inline-block align-text-top">
            </a>
            <a href="/guru" class="btn btn-outline-secondary">back</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Input Penilaian Kinerja Guru</h1>

        <form action="{{ route('teacher-performance.store') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-3 row">
                <label for="teacher_name" class="col-sm-3 col-form-label">Nama Guru:</label>
                <div class="col-sm-9">
                    <select class="form-select" name="teacher_name" required>
                        <option value="Ulfa Mujahidah">Ulfa Mujahidah</option>
                        <option value="Fatimah Azahra">Fatimah Azahra</option>
                        <option value="Parni Handayani">Parni Handayani</option>
                        <option value="Lutfi Hilmawan">Lutfi Hilmawan</option>
                        <option value="Mirza Bakti">Mirza Bakti</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="evaluator_name" class="col-sm-3 col-form-label">Nama Penilai:</label>
                <div class="col-sm-9">
                    <input type="text" id="evaluator_name" name="evaluator_name" placeholder="Nama Penilai"
                        class="form-control" required>
                </div>
            </div>

            <h3 class="mt-4">Kompetensi 1: Mengenal Karakteristik Peserta Didik</h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penilaian</th>
                        <th>Tidak ada bukti</th>
                        <th>Terpenuhi</th>
                        <th>Seluruhnya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya.</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_1" value="0"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_1" value="1"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_1" value="2"
                                    required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk
                            berpartisipasi aktif dalam kegiatan pembelajaran.</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_2" value="0"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_2" value="1"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_2" value="2"
                                    required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta
                            didik dengan kelainan fisik dan kemampuan belajar yang berbeda.</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_3" value="0"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_3" value="1"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_3" value="2"
                                    required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar
                            perilaku tersebut tidak merugikan peserta didik lainnya.</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_4" value="0"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_4" value="1"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_4" value="2"
                                    required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_5" value="0"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_5" value="1"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_5" value="2"
                                    required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti
                            aktivitas pembelajaran, sehingga peserta didik tersebut tidak terpinggirkan (tersisihkan,
                            diolok-olok, minder, dsb.).</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_6" value="0"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_6" value="1"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="penilaian_6" value="2"
                                    required>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>

        </form>

        <h2 class="text-center mb-4">Hasil Penilaian Guru</h2>

        <div class="col-lg-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Nama Penilai</th>
                                <th>Penilaian 1</th>
                                <th>Penilaian 2</th>
                                <th>Penilaian 3</th>
                                <th>Penilaian 4</th>
                                <th>Penilaian 5</th>
                                <th>Penilaian 6</th>
                                <th>Total Skor</th>
                                <th class="w-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($performances as $performance)
                                <tr>
                                    <td>{{ $performance->teacher_name }}</td>
                                    <td class="text-secondary">{{ $performance->evaluator_name }}</td>
                                    <td class="text-secondary">{{ $performance->penilaian_1 }}</td>
                                    <td class="text-secondary">{{ $performance->penilaian_2 }}</td>
                                    <td class="text-secondary">{{ $performance->penilaian_3 }}</td>
                                    <td class="text-secondary">{{ $performance->penilaian_4 }}</td>
                                    <td class="text-secondary">{{ $performance->penilaian_5 }}</td>
                                    <td class="text-secondary">{{ $performance->penilaian_6 }}</td>
                                    <td class="text-secondary">
                                        {{ $performance->penilaian_1 + $performance->penilaian_2 + $performance->penilaian_3 + $performance->penilaian_4 + $performance->penilaian_5 + $performance->penilaian_6 }}
                                    </td>
                                    <td>
                                        <div class="btn-group gap-2 mt-2">
                                            <form
                                                action="{{ route('teacher-performance.destroy', $performance->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-sm btn-outline-danger"
                                                    onclick="return confirm('Apakah yakin ingin menghapus item ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7h16" />
                                                        <path d="M10 11v6" />
                                                        <path d="M14 11v6" />
                                                        <path d="M5 7l1 14h12l1 -14" />
                                                        <path d="M8 7v-4h8v4" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('teacher-performance.generatePdf', $performance->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-icon btn-sm btn-outline-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M6 21h12a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2z" />
                                                        <path d="M6 11l6 6l6 -6" />
                                                        <path d="M12 3v12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-6">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 6l-6 6l6 6"></path>
                        </svg>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="/teacher-performance">1</a></li>
                <li class="page-item"><a class="page-link" href="/teacherPerformancePage2">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
</body>

</html>
