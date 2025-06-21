<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\TaskDivisionProgress;
use App\Models\Division;
use Illuminate\Support\Facades\Http;


class TaskProgressController extends Controller
{
    // ✅ Tampilkan form update progress
    public function edit(Task $task)
    {
        $user = Auth::user();
        $division = $user->division;

        // Ambil progress user saat ini (kalau sudah pernah update)
        $progress = TaskDivisionProgress::where('task_id', $task->task_id)
            ->where('division_id', $division->division_id)
            ->first();

        return view('user.task_progress.edit', compact('task', 'division', 'progress'));
    }

    // ✅ Proses simpan update progress
    public function update(Request $request, Task $task)
    {
        $user = Auth::user();
        $division = $user->division;

        $progress = TaskDivisionProgress::updateOrCreate(
            [
                'task_id' => $task->task_id,
                'division_id' => $division->division_id,
            ],
            [
                'user_id' => $user->user_id,
                'note' => $request->note,
            ]
        );

        // Cek divisi untuk menentukan tipe update
        if (in_array($division->name, ['design', 'pengadaan','pembelian'])) {
            $request->validate([
                'progress_percent' => 'required|in:50,75,100',
                'file_upload' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
            ]);

            $progress->progress_percent = $request->progress_percent;

            // Handle upload file jika ada
            if ($request->hasFile('file_upload')) {
                $path = $request->file('file_upload')->store('task-files', 'public');
                $progress->file_url = $path;
            }

            // Jika progress sudah 100%, ubah status ke done
            if ($request->progress_percent == 100) {
                $progress->status = 'acc_admin'; // bisa kamu ubah jadi done kalau tidak perlu acc lagi
            } else {
                $progress->status = 'pending';
            }
        } else {
            // Penjahit / Pengemasan
            $request->validate([
                'jumlah_selesai' => 'required|integer|min:0|max:' . $task->jumlah,
            ]);

            $progress->jumlah_selesai = $request->jumlah_selesai;

            // Hitung progress berdasarkan jumlah selesai
            $progress->progress_percent = ($request->jumlah_selesai / $task->jumlah) * 100;
            $progress->status = 'done';
        }

        $progress->save();
        // Hitung ulang total progress
        $progressList = TaskDivisionProgress::where('task_id', $task->task_id)
        ->with('division')
        ->get();
    

$totalProgress = 0;

foreach ($progressList as $p) {
    $divName = strtolower($p->division->name);

    if (in_array($divName, ['design', 'pengadaan', 'pembelian'])) {
        $totalProgress += ($p->progress_percent / 100) * 25;
    } elseif ($divName === 'penjahit' && $p->jumlah_selesai) {
        $totalProgress += ($p->jumlah_selesai / $task->jumlah) * 25;
    } elseif ($divName === 'pengemasan' && $p->jumlah_selesai) {
        $totalProgress += ($p->jumlah_selesai / $task->jumlah) * 25;
    }
}


// Update ke tasks.progress
$task->progress = round($totalProgress, 2); // pakai 2 desimal biar lebih presisi
$task->save();
if ($task->progress == 100) {
    $task->status = 'completed';
    $task->save();
}

// 🔔 Kirim WA otomatis berdasarkan progress task
$customer = $task->customer;
$progress = $task->progress;

if ($customer && $customer->nomor) {
    $nomor = ltrim($customer->nomor, '0'); // Buang 0 di depan
    $nomor = '62' . $nomor;

    $message = null;

    if ($progress >= 50 && $progress < 75) {
        $message = "Halo {$customer->nama}, pesanan Anda sedang dalam proses (50%). Mohon ditunggu ya 🙏";
    } elseif ($progress >= 75 && $progress < 100) {
        $message = "Halo {$customer->nama}, pesanan Anda hampir selesai (75%). Kami akan segera mengemasnya!";
    } elseif ($progress == 100) {
        $message = "Halo {$customer->nama}, pesanan Anda sudah selesai dan siap dikirim! ";
    }

    if ($message) {
        // Http::withHeaders([
        //     'Authorization' => env('shqzF4uZL5f25dKb44Kh'),
        // ])->post('https://api.fonnte.com/send', [
        //     'target' => $nomor,
        //     'message' => $message,
        // ]);
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $nomor,
            'message' => $message,
        ]);
        
        // dd($response->json()); // 🔥 Debug hasil response API di sini
        
    }
}


        // ⏳ Tambahan: kamu bisa hitung dan update total task progress di sini juga

        return redirect()->route('user.dashboard')->with('success', 'Progress berhasil diperbarui!');
    }
}

