<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Customer;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::where('status', 'active')->latest()->get();
    return view('admin.tasks.index', compact('tasks'));
}
public function history()
{
    $tasks = Task::where('status', 'completed')->latest()->get();
    return view('admin.tasks.history', compact('tasks'));
}


    // ✅ Form tambah task
    public function create()
    {
        $customers = Customer::all();
        return view('admin.tasks.create', compact('customers'));
    }

    // ✅ Simpan task baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_task' => 'required',
            'warna' => 'required',
            'jumlah' => 'required|integer',
            'waktu_pengerjaan' => 'required|date',
            'ukuran' => 'nullable|string',
            'owner_id' => 'required|exists:customers,customer_id',
        ]);

        Task::create($request->all());

        return redirect()->route('admin.tasks.index')->with('success', 'Task berhasil ditambahkan');
    }

    // ✅ Form edit task
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $customers = Customer::all();
        return view('admin.tasks.edit', compact('task', 'customers'));
    }

    // ✅ Update task
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_task' => 'required',
            'warna' => 'required',
            'jumlah' => 'required|integer',
            'waktu_pengerjaan' => 'required|date',
            'ukuran' => 'nullable|string',
            'owner_id' => 'required|exists:customers,customer_id',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('admin.tasks.index')->with('success', 'Task berhasil diupdate');
    }

    // ✅ Hapus task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task berhasil dihapus');
    }
}
