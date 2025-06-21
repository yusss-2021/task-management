@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('template.nav')
            @include('template.top_nav')
         </div>
         <div class="w-full mx-auto p-6 sm:p-8">
            <div class="flex flex-col mb-4 border-b border-gray-300 pb-4">
                <h1 class="block font-semibold leading-6 text-xl mb-1">Edit Tugas</h1>
             </div>
             <form action="{{ route('admin.tasks.update', $task) }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow-md">
                @csrf
                @method('PUT')

                {{-- Nama Tugas --}}
                <div>
                    <label class="block font-medium mb-1">Nama Tugas:</label>
                    <input type="text" name="nama_task" value="{{ old('nama_task', $task->nama_task) }}" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-indigo-300">
                </div>
            
                {{-- Warna --}}
                <div>
                    <label class="block font-medium mb-1">Warna:</label>
                    <input type="text" name="warna" value="{{ old('warna', $task->warna) }}" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-indigo-300">
                </div>
            
                {{-- Jumlah --}}
                <div>
                    <label class="block font-medium mb-1">Jumlah:</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $task->jumlah) }}" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-indigo-300">
                </div>
            
                {{-- Waktu Pengerjaan --}}
                <div>
                    <label class="block font-medium mb-1">Waktu Pengerjaan:</label>
                    <input type="date" name="waktu_pengerjaan" value="{{ old('waktu_pengerjaan', $task->waktu_pengerjaan) }}" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-indigo-300">
                </div>
            
                {{-- Ukuran --}}
                <div>
                    <label class="block font-medium mb-1">Ukuran:</label>
                    <input type="text" name="ukuran" value="{{ old('ukuran', $task->ukuran) }}"
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-indigo-300">
                </div>
            
                {{-- Customer --}}
                <div>
                    <label class="block font-medium mb-1">Pilih Customer:</label>
                    <select name="owner_id" required
                        class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-indigo-300">
                        <option value="">-- Pilih Customer --</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}" {{ old('owner_id', $task->owner_id) == $customer->customer_id ? 'selected' : '' }}>
                            {{ $customer->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
            
                {{-- Tombol --}}
                <div class="flex items-center justify-between pt-4">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">
                        Simpan
                    </button>
                    <a href="{{ route('admin.tasks.index') }}" class="text-gray-600 hover:underline">⬅️ Kembali</a>
                </div>
            </form>
            
        </div>
         </div>
      </main>
@include('template.footer')
 
