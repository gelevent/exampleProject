<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <style>
        .card-container {
            max-height: calc(3 * 12rem);
            overflow-y: auto;
        }

        /* Menyembunyikan tombol jika container scrollable */
        .card-container::-webkit-scrollbar {
            display: none;
        }

        .card-container {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Gaya tombol, misalnya: */
        .hide-on-scroll {
            display: none;
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
        </div>
    </nav>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label">Gelar</label>
                                    <input type="text" class="form-control" autocomplete="off" name="gelar"
                                        required>
                                    @error('gelar')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select" name="role" required>
                                        <option value="Guru">Guru</option>
                                        <option value="BK">BK</option>
                                        <option value="Kepsek">Kepsek</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Guru Mapel</label>
                                <select class="form-select" name="guruMapel" required>
                                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                                    <option value="SAAS">SAAS</option>
                                    <option value="PAAS">PAAS</option>
                                    <option value="PAI">PAI</option>
                                    <option value="SIOT">SIOT</option>
                                    <option value="">-</option>
                                </select>
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
        <!-- Button to open modal -->
        <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
            data-bs-target="#modal-report">
            Create Data
        </button>
        <a href="/" class="btn btn-outline-secondary mt-3 mx-2">
            Back
        </a>

        <div class="col-12 mt-4">
            <div class="card-container">
                <div class="row">
                    @foreach ($dataGuru as $item)
                        <div class="col-md-4">
                            <a href="{{ route('assessment.index')  }}" class="text-decoration-none">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Gelar: {{ $item->gelar }}</h6>
                                        <p class="card-text">
                                            <strong>Role:</strong> {{ $item->role }}<br>
                                            <strong>Guru Mapel:</strong> {{ $item->guruMapel }}
                                        </p>
                                        <div class="btn-group">
                                            <button class="btn btn-icon btn-sm btn-outline-success"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalUpdate1{{ $item->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('dataGuru.destroy', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-sm btn-outline-danger"
                                                    onclick="return confirm('Apakah yakin ingin menghapus item ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icon-tabler-trash">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7h16" />
                                                        <path d="M10 11v6" />
                                                        <path d="M14 11v6" />
                                                        <path d="M5 7l1 14h12l1 -14" />
                                                        <path d="M8 7v-4h8v4" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk update item -->
    @foreach ($dataGuru as $item)
        <div class="modal modal-blur fade" id="modalUpdate1{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Teacher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dataGuru.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $item->name }}" placeholder="Your Name">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label">Gelar</label>
                                        <input type="text" class="form-control" autocomplete="off" name="gelar"
                                            value="{{ $item->gelar }}">
                                        @error('gelar')
                                            <div class="text-danger mt-2">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-select" name="role">
                                            <option value="Guru" {{ $item->role == 'Guru' ? 'selected' : '' }}>
                                                Guru</option>
                                            <option value="BK" {{ $item->role == 'BK' ? 'selected' : '' }}>
                                                BK</option>
                                            <option value="Kepsek" {{ $item->role == 'Kepsek' ? 'selected' : '' }}>
                                                Kepsek</option>
                                            <option value="-" {{ $item->role == '' ? '' : '' }}>
                                                -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Guru Mapel</label>
                                        <select class="form-select" name="guruMapel">
                                            <option value="Bahasa Indonesia"
                                                {{ $item->guruMapel == 'Bahasa Indonesia' ? 'selected' : '' }}>
                                                Bahasa Indonesia</option>
                                            <option value="Bahasa Inggris"
                                                {{ $item->guruMapel == 'Bahasa Inggris' ? 'selected' : '' }}>
                                                Bahasa Inggris</option>
                                            <option value="SAAS" {{ $item->guruMapel == 'SAAS' ? 'selected' : '' }}>
                                                SAAS</option>
                                            <option value="PAAS" {{ $item->guruMapel == 'PAAS' ? 'selected' : '' }}>
                                                PAAS</option>
                                            <option value="PAI" {{ $item->guruMapel == 'PAI' ? 'selected' : '' }}>
                                                PAI</option>
                                            <option value="SIOT" {{ $item->guruMapel == 'SIOT' ? 'selected' : '' }}>
                                                SIOT</option>
                                            <option value="-" {{ $item->guruMapel == '' ? '' : '' }}>
                                                -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                            <button class="btn btn-primary ms-auto" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal -->

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                var myModal = new bootstrap.Modal(document.getElementById('modal-report'));
                myModal.show();
                var myModal = new bootstrap.Modal(document.getElementById('modalUpdate'));
                myModal.show();
            @endif
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });
    </script>
</body>

</html>
