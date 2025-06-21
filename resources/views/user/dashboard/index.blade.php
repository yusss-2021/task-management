@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('user.nav')
            @include('template.top_nav')
         </div>
         <div class="w-full mx-auto p-6 sm:p-8">
            <div class="flex flex-col mb-4 border-b border-gray-300 pb-4">
                <h1 class="block font-semibold leading-6 text-xl mb-1">Daftar Tugas Divisi - {{ ucfirst($divisi) }}</h1>
             </div>
             
             <table class="w-full border-collapse border rounded-md shadow-sm overflow-hidden text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Nama Tugas</th>
                        <th class="p-3 text-left">Tanggal Selesai</th>
                        <th class="p-3 text-left">Jumlah</th>
                        <th class="p-3 text-left">Progress</th>
                        <th class="p-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($tasks as $task)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3">{{ $task->nama_task }}</td>
                        <td class="p-3">{{ $task->waktu_pengerjaan }}</td>
                        <td class="p-3">{{ $task->jumlah }}</td>
                        <td class="p-3 font-semibold text-blue-600">{{ $task->progress }}%</td>
                        <td class="p-3 flex items-center gap-2">
                            <button onclick="toggleDetail({{ $task->task_id }})" class="text-gray-600 hover:text-blue-600 text-sm">
                                🔍 Detail
                            </button>
                            <a href="{{ route('user.task.progress.edit', $task->task_id) }}" class="text-indigo-600 hover:underline text-sm">
                                ✏️ Update
                            </a>
                        </td>
                    </tr>
                    <tr id="detail-{{ $task->task_id }}" class="hidden bg-gray-50">
                        <td colspan="5" class="p-4">
                            <strong class="text-gray-700">📊 Progress per Divisi:</strong>
                            <ul class="mt-2 space-y-2 list-disc list-inside text-sm text-gray-700">
                                @foreach($task->divisionProgress as $div)
                                <li>
                                    <strong>{{ ucfirst($div->division->name) }}:</strong> {{ $div->progress_percent ?? 0 }}%
                                    @if(in_array($div->division->name, ['design', 'pengadaan']))
                                        (Status: {{ $div->status ?? '-' }})
                                    @endif
                                    @if($div->jumlah_selesai)
                                        - {{ $div->jumlah_selesai }} selesai
                                    @endif
                                    @if($div->file_url)
                                        <br>📎 <a href="{{ asset('storage/' . $div->file_url) }}" class="text-blue-600 underline" target="_blank">Lihat File</a>
                                    @endif
                                    @if($div->note)
                                        <br>📝 Catatan: {{ $div->note }}
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center p-6 text-gray-500">Belum ada tugas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            <script>
                function toggleDetail(id) {
                    const row = document.getElementById('detail-' + id);
                    if (row.classList.contains('hidden')) {
                        row.classList.remove('hidden');
                    } else {
                        row.classList.add('hidden');
                    }
                }
            </script>
            
             </div>
      </main>
@include('template.footer')
 
