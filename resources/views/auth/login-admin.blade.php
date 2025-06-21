@include('template.head')
<div class="flex flex-col items-center justify-center g-0 h-screen px-4">
    <!-- card -->
    <div class="justify-center items-center w-full bg-white rounded-md shadow lg:flex md:mt-0 max-w-md xl:p-0">
       <!-- card body -->
       <div class="p-6 w-full sm:p-8 lg:p-8">
          <div class="mb-4">
<h2>
   TARIZ KONVEKSI - ADMIN
</h2>
          </div>
          <!-- form -->
          <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
            @csrf

            <!-- Di dalam form -->
            <div class="mb-4">
               <label>Email</label>
               <input type="email" name="email" class="w-full border p-2 rounded" value="{{ old('email') }}">
               @error('email')
                  <div class="text-red-600 text-sm">{{ $message }}</div>
               @enderror
            </div>

            <div class="mb-4">
               <label>Password</label>
               <input type="password" name="password" class="w-full border p-2 rounded">
               @error('password')
                  <div class="text-red-600 text-sm">{{ $message }}</div>
               @enderror
            </div>

            @if($errors->has('auth'))
               <div class="bg-red-100 border border-red-400 text-red-700 p-2 rounded">
                  {{ $errors->first('auth') }}
               </div>
            @endif

             <div>
                <!-- button -->
                <div class="grid">
                   <button
                      type="submit"
                      class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                      Sign in
                   </button>
                </div>
             </div>
          </form>
       </div>
    </div>
 </div>
 @include('template.footer')