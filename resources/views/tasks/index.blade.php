<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="flex items-center justify-center px-4 py-3 text-2xl font-bold">
    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
        <a href="/tasks" :active="request()->routeIs('task.index')">{{ __('Home') }}</a>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
        <a href="{{ url('/tasks/completed')}}" :active="request()->Is('task/completed')">{{ __('Completed') }}</a>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
        <a href="/tasks/incomplete" :active="request()->Is('task/incomplete')"> {{ __('Incomplete') }}</a>
    </div>
    </nav>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Daftar Tugas</h1>
        <a href="/tasks/create" class="text-white mt-4 bg-blue-700 p-2 rounded-lg hover:bg-blue-900">Tambah Tugas</a>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 my-4">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->judul }}</td>
                        <td class="border px-4 py-2">{{ $task->deskripsi }}</td>
                        <td class="border px-4 py-2">
                        <form class="" action="{{ url('task/' . $task->id . '/status') }}"method="post">
                            @csrf
                            @method('PUT')
                            <div class="w-full   flex justify-between">
                                <select class="appearance-none bg-transparent" name="status" id="status">
                                    <option class=" text-black" value="{{ $task->status }}">{{ $task->status }}</option>
                                    @if ($task->status == 'Belum selesai')
                                    <option class=" text-black" value="Selesai">Selesai</option>
                                    @else  
                                    <option class=" text-black" value="Belum selesai">Belum selesai</option>
                                    @endif
                                </select>
                                <button class="m-auto float-right bg-blue-700 hover:bg-blue-800 p-2 text-white rounded-lg" type="submit" name="create" id='status'>Update
                                    </button>
                                </div>
                        </form>
                        </td>
                        </select>
                        <td class="border px-4 py-2">
                            <a href="{{route ('tasks.show', $task ->id)}}" class="text-white mt-4 bg-blue-700 p-2 rounded-lg hover:bg-blue-900">Detail</a>
                            <a href="{{route ('tasks.edit', $task ->id)}}" class="text-white mt-4 bg-yellow-400 p-2 rounded-lg hover:bg-yellow-600">Edit</a>
                            <form action="{{route ('tasks.destroy', $task ->id)}}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white mt-4 bg-red-500 p-2 rounded-lg hover:bg-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
