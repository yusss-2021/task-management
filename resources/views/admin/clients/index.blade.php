@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('template.nav')
            @include('template.top_nav')
         </div>
         <div class="w-full mx-auto p-6 sm:p-8">
            @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
    
        <a href="{{ route('admin.clients.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Client</a>
        <div class="bg-white shadow-md rounded-lg p-2 mt-6">
        
            <table class="min-w-full divide-y divide-gray-200 border w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">#</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nomor</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Alamat</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($customers as $index => $customer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->nama }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->nomor }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $customer->alamat }}</td>
                            <td class="px-4 py-2 text-sm">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.clients.edit', $customer->customer_id) }}"
                                       class="text-blue-600 hover:underline">Edit</a>
        
                                    <form action="{{ route('admin.clients.destroy', $customer->customer_id) }}" method="POST"
                                          onsubmit="return confirm('Hapus client ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
        </div>
      </main>
@include('template.footer')
 
