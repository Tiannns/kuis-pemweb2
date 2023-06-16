<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas</title>
</head>
<body>
    <h1>Daftar Tugas</h1>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->judul }}</td>
                    <td>{{ $task->deskripsi }}</td>
                    <td>{{ $task->status }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
