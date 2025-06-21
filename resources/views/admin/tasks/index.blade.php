@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('template.nav')
            @include('template.top_nav')
         </div>
         <div class="w-full mx-auto p-6 sm:p-8">
            <!-- Top recruitment banner -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border border-gray-300 rounded-lg px-6 py-4 mb-8 gap-4">
                <a href="{{ route('admin.tasks.create') }}" aria-label="Tambah Tugas"
                class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 transition-colors rounded-full px-4 py-2 text-white font-semibold text-sm sm:text-base"
                style="width:150px">
                <i class="fas fa-plus text-lg"></i>
                <span>tambah tugas</span>
             </a>
                        
            </div>
            <div class="overflow-x-auto scrollbar-hide">
                
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
                            <th scope="col" class="px-6 py-3">action</th>
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
                            <td class="py-3 px-6 text-left">
                                <a href="{{ route('admin.tasks.edit', $task->task_id) }}" style="margin-right:10px; color:blue;">✏️ Edit</a>
        
                                <form action="{{ route('admin.tasks.destroy', $task->task_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin mau hapus tugas ini?')" style="color:red; background:none; border:none; cursor:pointer;">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
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
 
