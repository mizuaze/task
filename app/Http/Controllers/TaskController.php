<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->tasks; // Ambil tugas dari pengguna yang sedang login
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Task::create([
            'name' => $request->nama,
            'description' => $request->deskripsi,
            'status' => false, // Menentukan default status
            'user_id' => auth()->id(), // Jika terkait dengan pengguna tertentu
        ]);

        return redirect()->route('tasks')->with('success', 'Tugas baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
       $task->delete();
       return response()->json(['message' => 'Task deleted.']);
    }

    public function complete(Task $task)
    {
          $task->update(['status' => true]);
          return response()->json(['message' => 'Task marked as completed.']);
    }
    
    public function incomplete(Task $task)
    {
          $task->update(['status' => false]);
          return response()->json(['message' => 'Task marked as completed.']);
    }
}
