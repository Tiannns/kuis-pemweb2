<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function completed()
    {
        $tasks = Task::where('status', '=', 'Selesai')->get();
        return view('tasks.index', compact('tasks'));
    }
    public function incomplete()
    {
        $tasks = Task::where('status', '=', 'Belum selesai')->get();
        
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Task::create($validatedData);

        return redirect('/tasks')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {  
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
            
        ]);

        Task::whereId($id)->update($validatedData);

        return redirect('/tasks')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function updateStatus(Request $request, string $id)
    {
        $data = [
            'status' => $request->input('status')
        ];
        task::where('id', $id)->update($data);
        return redirect()->to('tasks')->with('success', 'Berhasil Mengudpate Status');

    }

    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('/tasks')->with('success', 'Tugas berhasil dihapus!');
    }
}
