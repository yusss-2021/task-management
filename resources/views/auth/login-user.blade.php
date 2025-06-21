@include('template.head')
<div class="flex flex-col items-center justify-center g-0 h-screen px-4">
    <!-- card -->
    <div class="justify-center items-center w-full bg-white rounded-md shadow lg:flex md:mt-0 max-w-md xl:p-0">
       <!-- card body -->
       <div class="p-6 w-full sm:p-8 lg:p-8">
          <div class="mb-4">
            <h2>
               TARIZ KONVEKSI - USER
            </h2>
          </div>
          <!-- form -->
          <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
            @csrf

            {{-- Email --}}
             <!-- username -->
             <div class="mb-3">
                <label for="email" class="inline-block mb-2">Username or email</label>
                <input
                   type="email"
                   
                   class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                   type="email" name="email" placeholder="Email" required/>
                   @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
             </div>

             <!-- password -->
             <div class="mb-5">
                <label for="password" class="inline-block mb-2">Password</label>
                <input
                type="password" name="password" placeholder="Password" required
                   class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                    />
                   @error('password')
                   <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
               @enderror
             </div>
             <div>
                <!-- button -->
                <div class="grid">
                   <button
                      type="submit"
                      class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                      Sign in
                   </button>
                </div>
{{-- 
                <div class="flex justify-between mt-4">
                   <div class="mb-2">
                      <a href="{{ route('admin.signup.form') }}" class="text-indigo-600 hover:text-indigo-600">Create An Account</a>
                   </div>
                   <div>
                      <a href="forget-password.html" class="text-indigo-600 hover:text-indigo-600">Forgot your password?</a>
                   </div>
                </div> --}}
             </div>
          </form>
       </div>
    </div>
 </div>
 @include('template.footer')