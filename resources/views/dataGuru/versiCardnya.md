<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <style>
        .card-container {
            max-height: calc(3 * 12rem);
            overflow-y: auto;
        }

        .card-container::-webkit-scrollbar {
            display: none;
        }

        .card-container {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid col-md-10">
            <a class="navbar-brand" href="/">
                <img src="https://res.cloudinary.com/dhyq9uts4/image/upload/v1676360444/logo_v09np1.png" alt="Logo"
                    height="45" class="d-inline-block align-text-top">
            </a>
            <a href="/" class="btn btn-outline-secondary">Back</a>
        </div>
    </nav>

    <!-- Modal untuk menambah data -->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create.guru') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" required>
                                @error('nik')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control" name="ttl"
                                    placeholder="Bogor, 11/03/2000" required>
                                @error('ttl')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Guru Mapel</label>
                            <select class="form-select" name="guruMapel" required>
                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                                <option value="SAAS">SAAS</option>
                                <option value="PAAS">PAAS</option>
                                <option value="PAI">PAI</option>
                                <option value="SIOT">SIOT</option>
                            </select>
                            @error('guruMapel')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenisKelamin" required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenisKelamin')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Pendidikan</label>
                                <select class="form-select" name="pendidikan" required>
                                    <option value="SMK">SMK</option>
                                    <option value="SMA">SMA</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @error('pendidikan')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary ms-auto" type="submit">Create new report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-primary mt-3 mx-3" data-bs-toggle="modal"
                        data-bs-target="#modal-report">
                        Create Data
                    </button>
                    <a href="/teacher-performance" class="btn btn-outline-success mt-3 px-6">Penilaian Guru</a>
                </div>
            </div>

        <div class="card-container mt-4">
            <div class="row">
                @foreach ($dataGuru as $item)
                    <div class="col-md-4 mb-3">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">NIK: {{ $item->nik }}</h6>
                                <p class="card-text">
                                    <strong>Tempat, Tanggal Lahir:</strong> {{ $item->ttl }}<br>
                                    <strong>Guru Mapel:</strong> {{ $item->guruMapel }}<br>
                                    <strong>Jenis Kelamin:</strong> {{ $item->jenisKelamin }}<br>
                                    <strong>Pendidikan:</strong> {{ $item->pendidikan }}
                                </p>
                                <div class="btn-group gap-2 mt-2">
                                    <!-- Button Edit -->
                                    <button class="btn btn-icon btn-sm btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate1{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </button>
                                    <!-- Button Delete -->
                                    <form action="{{ route('dataGuru.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-sm btn-outline-danger"
                                            onclick="return confirm('Apakah yakin ingin menghapus item ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7h16" />
                                                <path d="M10 11v6" />
                                                <path d="M14 11v6" />
                                                <path d="M5 7l1 14h12l1 -14" />
                                                <path d="M8 7v-4h8v4" />
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- Button Download PDF -->
                                    <a href="{{ route('download.pdf', $item->id) }}"
                                        class="btn btn-icon btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M6 21h12a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2z" />
                                            <path d="M6 11l6 6l6 -6" />
                                            <path d="M12 3v12" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <!-- Modal Update -->
                        <div class="modal modal-blur fade" id="modalUpdate1{{ $item->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Teacher</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('dataGuru.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $item->name }}" required>
                                                @error('name')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <label class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nik"
                                                        value="{{ $item->nik }}" required>
                                                    @error('nik')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <label class="form-label">Tempat, Tanggal Lahir</label>
                                                    <input type="text" class="form-control" name="ttl"
                                                        value="{{ $item->ttl }}" required>
                                                    @error('ttl')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Guru Mapel</label>
                                                <select class="form-select" name="guruMapel" required>
                                                    <option value="Bahasa Indonesia"
                                                        {{ $item->guruMapel == 'Bahasa Indonesia' ? 'selected' : '' }}>
                                                        Bahasa Indonesia</option>
                                                    <option value="Bahasa Inggris"
                                                        {{ $item->guruMapel == 'Bahasa Inggris' ? 'selected' : '' }}>
                                                        Bahasa Inggris</option>
                                                    <option value="SAAS"
                                                        {{ $item->guruMapel == 'SAAS' ? 'selected' : '' }}>SAAS
                                                    </option>
                                                    <option value="PAAS"
                                                        {{ $item->guruMapel == 'PAAS' ? 'selected' : '' }}>PAAS
                                                    </option>
                                                    <option value="PAI"
                                                        {{ $item->guruMapel == 'PAI' ? 'selected' : '' }}>PAI</option>
                                                    <option value="SIOT"
                                                        {{ $item->guruMapel == 'SIOT' ? 'selected' : '' }}>SIOT
                                                    </option>
                                                </select>
                                                @error('guruMapel')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" name="jenisKelamin" required>
                                                        <option value="Laki-Laki"
                                                            {{ $item->jenisKelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                            Laki-Laki</option>
                                                        <option value="Perempuan"
                                                            {{ $item->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                    @error('jenisKelamin')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <label class="form-label">Pendidikan</label>
                                                    <select class="form-select" name="pendidikan" required>
                                                        <option value="SMK"
                                                            {{ $item->pendidikan == 'SMK' ? 'selected' : '' }}>SMK
                                                        </option>
                                                        <option value="SMA"
                                                            {{ $item->pendidikan == 'SMA' ? 'selected' : '' }}>SMA
                                                        </option>
                                                        <option value="S1"
                                                            {{ $item->pendidikan == 'S1' ? 'selected' : '' }}>S1
                                                        </option>
                                                        <option value="S2"
                                                            {{ $item->pendidikan == 'S2' ? 'selected' : '' }}>S2
                                                        </option>
                                                        <option value="S3"
                                                            {{ $item->pendidikan == 'S3' ? 'selected' : '' }}>S3
                                                        </option>
                                                    </select>
                                                    @error('pendidikan')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-link link-secondary"
                                                data-bs-dismiss="modal">Cancel</a>
                                            <button class="btn btn-primary ms-auto" type="submit">Update
                                                Report</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
</body>

</html> -->
