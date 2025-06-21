<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; // ⬅️ WAJIB DITAMBAHKAN
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $divisi = $user->division->name;

        // Ambil semua task (nanti bisa difilter berdasarkan divisi)
        $tasks = Task::with('divisionProgress.division')->get();

        return view('user.dashboard.index', compact('user', 'divisi', 'tasks'));
    }
}
