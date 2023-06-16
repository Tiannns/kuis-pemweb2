<!DOCTYPE html>
<html>
<head>
    <title>Detail Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Detail Tugas</h1>

        <h2 class="text-xl font-bold">Judul: {{ $task->judul }}</h2>
        <p class="mb-4">Deskripsi: {{ $task->deskripsi }}</p>
        <p class="mb-4">Status: {{ $task->status }}</p>

        <a href="/tasks/{{ $task->id }}/edit" class="text-yellow-500 mr-2">Edit</a>
        <form action="/tasks/{{ $task->id }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Hapus</button>
        </form>

        <a href="/tasks" class="text-blue-500 mt-4">Kembali ke Daftar Tugas</a>
    </div>
</body>
</html>
