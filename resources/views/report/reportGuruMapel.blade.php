<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment</title>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid col-md-10">
            <a class="navbar-brand" href="/">
                <img src="https://res.cloudinary.com/dhyq9uts4/image/upload/v1676360444/logo_v09np1.png" alt="Logo"
                    height="45" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <div class="container">
        <p class="mt-2">Nama Guru: Ulfa Mujahidah</p>
        <p>Nama Penilai: Mujahidah</p>

        <a href="/guru" class="btn btn-outline-secondary my-3">
            Back
        </a>

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('assessment.store') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Indikator</th>
                        <th>Tidak ada bukti</th>
                        <th>Terpenuhi sebagian</th>
                        <th>Terpenuhi</th>
                        <th>Sekor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($indicators as $indicator)
                        <tr>
                            <td>{{ $indicator['text'] }}</td>
                            <td><input class="form-check-input" type="radio" name="score[{{ $indicator['id'] }}]"
                                    value="0"></td>
                            <td><input class="form-check-input" type="radio" name="score[{{ $indicator['id'] }}]"
                                    value="1"></td>
                            <td><input class="form-check-input" type="radio" name="score[{{ $indicator['id'] }}]"
                                    value="2"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit">Submit</button>
        </form>

        @if (isset($assessments) && $assessments->isNotEmpty())
            <h2>Assessment Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Indikator</th>
                        <th>Skor</th>
                        <th>Actions</th> <!-- New column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->indicator }}</td>
                            <td>{{ $assessment->score }}</td>
                            <td>
                                <form action="{{ route('assessment.destroy', $assessment->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this assessment?');"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                                <a href="{{ route('assessment.edit', $assessment->id) }}">Edit</a> <!-- Edit button -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total Skor: {{ $totalScore }}</p>
            <p>Persentase: {{ $percentage }}%</p>
        @endif
    </div>

</body>

</html>
