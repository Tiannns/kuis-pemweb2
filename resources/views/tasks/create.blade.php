<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Tambah Tugas Baru</h1>

        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-2 mb-4">
                <ul class="list-disc pl-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/tasks" method="POST">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block">Judul:</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required class="border border-gray-300 rounded-md px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required class="border border-gray-300 rounded-md px-4 py-2 w-full">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Tambah Tugas</button>
        </form>

        <a href="/tasks" class="text-blue-500 mt-4">Kembali ke Daftar Tugas</a>
    </div>
</body>
</html>
