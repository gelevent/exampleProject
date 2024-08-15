<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assessment</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Edit Assessment</h1>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('assessment.update', $assessment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <thead>
            <tr>
                <th>Indikator</th>
                <th>Tidak ada bukti</th>
                <th>Terpenuhi sebagian</th>
                <th>Terpenuhi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($indicators as $indicator)
                <tr>
                    <td>{{ $indicator['text'] }}</td>
                    <td><input type="radio" name="score[{{ $indicator['id'] }}]" value="0" {{ $assessment->score == 0 ? 'checked' : '' }}></td>
                    <td><input type="radio" name="score[{{ $indicator['id'] }}]" value="1" {{ $assessment->score == 1 ? 'checked' : '' }}></td>
                    <td><input type="radio" name="score[{{ $indicator['id'] }}]" value="2" {{ $assessment->score == 2 ? 'checked' : '' }}></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit">Update</button>
</form>

<a href="{{ route('report.reportGuruMapel') }}">Back to Assessment List</a>

</body>
</html>
