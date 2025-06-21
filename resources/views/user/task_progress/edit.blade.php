@extends('admin.layout')

@section('content')
    <h2>Update Progress - Divisi: {{ ucfirst($division->name) }}</h2>

    <p><strong>Nama Tugas:</strong> {{ $task->nama_task }}</p>
    <p><strong>Jumlah Pesanan:</strong> {{ $task->jumlah }}</p>

    <form action="{{ route('user.task.progress.update', $task->task_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- FORM UNTUK DESIGN & PENGADAAN --}}
        @if(in_array(strtolower($division->name), ['design', 'pengadaan', 'pembelian']))
            <label><strong>Progress:</strong></label><br>
            <select name="progress_percent" required>
                <option value="">-- Pilih --</option>
                <option value="50" {{ $progress?->progress_percent == 50 ? 'selected' : '' }}>50% - Mulai Dikerjakan</option>
                <option value="75" {{ $progress?->progress_percent == 75 ? 'selected' : '' }}>75% - Kirim ke Admin</option>
                <option value="100" {{ $progress?->progress_percent == 100 ? 'selected' : '' }}>100% - Sudah ACC</option>
            </select><br><br>

            <label><strong>Upload File (Desain / Kain):</strong></label><br>
            <input type="file" name="file_upload" accept=".jpg,.jpeg,.png,.pdf"><br><br>

            @if($progress?->file_url)
                <p><strong>File Sebelumnya:</strong></p>
                <a href="{{ asset('storage/' . $progress->file_url) }}" target="_blank">🔗 Lihat File</a><br><br>
            @endif

        {{-- FORM UNTUK PENJAHIT & PENGEMASAN --}}
        @else
            <label><strong>Jumlah Diselesaikan:</strong></label><br>
            <input type="number" name="jumlah_selesai" min="0" max="{{ $task->jumlah }}" value="{{ $progress?->jumlah_selesai }}"><br><br>
        @endif

        <label><strong>Catatan:</strong></label><br>
        <textarea name="note" rows="4" style="width: 100%">{{ $progress?->note }}</textarea><br><br>

        <button type="submit" style="background:green; color:white; padding:10px 20px; border:none; border-radius:5px;">
            ✅ Simpan Progress
        </button>
        <a href="{{ route('user.dashboard') }}" style="margin-left: 15px;">⬅️ Kembali</a>
    </form>
@endsection
