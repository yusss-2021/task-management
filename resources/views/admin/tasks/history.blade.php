@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('template.nav')
            @include('template.top_nav')
         </div>
         <div class="w-full mx-auto p-6 sm:p-8">
    
            <div class="overflow-x-auto scrollbar-hide">
                {{-- <div class="mb-4 flex justify-end">
                    <form method="GET" action="" class="flex items-center gap-2">
                        <label for="status" class="text-sm text-gray-700">Filter Status:</label>
                        <select name="status" id="status" onchange="this.form.submit()"
                            class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring focus:border-blue-500">
                            <option value="">-- Semua --</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>
                </div> --}}
                
                <div class="relative overflow-x-auto">
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="bg-gray-200 text-gray-700 ">
                            <tr class="border-gray-300 border-b ">
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3"> Nama Pesanan</th>
                            <th scope="col" class="px-6 py-3">Customer</th>
                            <th scope="col" class="px-6 py-3">kode kain</th>
                            <th scope="col" class="px-6 py-3">Jumlah</th>
                            <th scope="col" class="px-6 py-3">progress</th>
                            <th scope="col" class="px-6 py-3">deadline</th>
                            <th scope="col" class="px-6 py-3">status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y ">
                            @forelse($tasks as $index => $task)
                            <tr class="border-gray-300 border-b ">
                            <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                            <td class="py-3 px-6 text-left">{{ $task->nama_task }}</td>
                            <td class="py-3 px-6 text-left">{{ $task->customer->nama ?? '-' }}</td>
                            <td class="py-3 px-6 text-left">{{ $task->warna }}</td>
                            <td class="py-3 px-6 text-left">{{ $task->jumlah }}</td>
                            <td class="py-3 px-6 text-left">{{ $task->progress }}%</td>
                            <td class="py-3 px-6 text-left">{{ $task->waktu_pengerjaan }}</td>
                            <td class="py-3 px-6 text-left">{{ $task->status }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" align="center">Belum ada tugas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                     </div>
               </div>
            </div>
        </div>
         </div>
      </main>
@include('template.footer')
 
