<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <title>Penilaian Kinerja Guru</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg color-dark bg-white shadow-sm">
        <div class="container-fluid col-md-10">
            <a class="navbar-brand" href="/">
                <img src="	https://res.cloudinary.com/dhyq9uts4/image/upload/v1676360444/logo_v09np1.png" alt="Logo"
                    height="45" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="/guru" class="text-decoration-none">
                        <div class="card bg-white shadow-sm mb-2 hover-shadow">
                            <div class="card-body d-flex align-items-center">
                                <img src="{{ asset('dist/img/gift/customer-review.gif') }}"
                                    style="width: 50%; height: auto; margin-right: 16px;">
                                <h2 class="card-title text-xl font-semibold mb-0"
                                    style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold;">
                                    Guru Mapel</h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="/guru" class="text-decoration-none">
                        <div class="card bg-white shadow-sm mb-2 hover-shadow">
                            <div class="card-body d-flex align-items-center">
                                <img src="{{ asset('dist/img/gift/mentorship.gif') }}" alt=""
                                    style="width: 50%; height: auto; margin-right: 16px;">
                                <h2 class="card-title text-xl font-semibold mb-0"
                                    style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold;">
                                    Guru BK</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="/guru" class="text-decoration-none">
                        <div class="card bg-white shadow-sm mb-2 hover-shadow">
                            <div class="card-body d-flex align-items-center">
                                <img src="{{ asset('dist/img/gift/professor.gif') }}" alt=""
                                    style="width: 50%; height: auto; margin-right: 16px;">
                                <h2 class="card-title text-xl font-semibold mb-0"
                                    style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold;">
                                    Perpustakaan </h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                var myModal = new bootstrap.Modal(document.getElementById('modal-report'));
                myModal.show();
            @endif
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });
    </script>
</body>

</html>
