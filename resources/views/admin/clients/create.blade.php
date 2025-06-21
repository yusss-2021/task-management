@include('template.head')
      <main>
         <div id="app-layout" class="overflow-x-hidden flex">
            <!-- start navbar -->
            @include('template.nav')
            @include('template.top_nav')
         </div>
         <div class="w-full mx-auto p-6 sm:p-8">
            <div class="flex flex-col mb-4 border-b border-gray-300 pb-4">
                <h1 class="block font-semibold leading-6 text-xl mb-1">Tambah customer</h1>
             </div>
             <div class="bg-white p-2 rounded shadow-md max-w-lg mx-auto mt-5">
            
                <form action="{{ route('admin.clients.store') }}" method="POST" class="space-y-5">
                    @csrf
            
                    {{-- Nama --}}
                    <div>
                        <label for="nama" class="block mb-1 font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama"
                               class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-indigo-300"
                               value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    {{-- Nomor --}}
                    <div>
                        <label for="nomor" class="block mb-1 font-medium text-gray-700">Nomor</label>
                        <input type="number" name="nomor" id="nomor"
                               class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-indigo-300"
                               value="{{ old('nomor') }}" required>
                        @error('nomor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block mb-1 font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                                  class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-indigo-300"
                                  required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    {{-- Tombol --}}
                    <div class="flex justify-between items-center pt-2">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow">
                            Simpan
                        </button>
                        <a href="{{ route('admin.clients.index') }}" class="text-gray-600 hover:underline">⬅ Kembali</a>
                    </div>
                </form>
            </div>             
        </div>
      </main>
@include('template.footer')
 
