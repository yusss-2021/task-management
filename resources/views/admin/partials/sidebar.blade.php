
<aside aria-label="Sidebar" class="w-64 h-screen bg-[#f3f5f7] rounded-xl p-5 font-sans text-gray-700 select-none">
    <!-- User Info -->
    <div class="flex items-center space-x-3 mb-6">
     <div class="flex flex-col leading-tight">
      <span class="font-semibold text-gray-900 text-base">
       Konveksi Manager
      </span>
      <div class="flex items-center text-gray-500 text-sm">
       <span>
        Task Management System
       </span>
      </div>
     </div>
    </div>
    <!-- Search -->
    <div class="relative mb-6">
     <input aria-label="Search" class="w-full pl-10 pr-10 py-2 rounded-lg bg-white text-gray-600 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-gray-300" placeholder="Search" type="search"/>
     <span aria-hidden="true" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">
      <i class="fas fa-search">
      </i>
     </span>
     <span aria-hidden="true" class="absolute right-3 top-1/2 -translate-y-1/2 bg-gray-200 text-gray-700 rounded-full px-2 py-0.5 text-xs font-semibold select-none">
      /
     </span>
    </div>
    <!-- Menu -->
    <nav class="space-y-2 text-gray-700 text-sm font-normal">
     <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 bg-white rounded-lg px-4 py-2 shadow-sm text-gray-900 font-semibold" href="#">
      <div class="w-5 h-5 flex items-center justify-center rounded bg-black text-white text-xs">
       <i class="fas fa-home"></i>
      </div>
      <span>
       Dashboard
      </span>
     </a>
     <a href="{{ route('admin.tasks.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors" href="#">
      <div class="w-5 h-5 flex items-center justify-center rounded bg-gray-300 text-gray-600 text-xs">
       <i class="fas fa-chart-bar"></i>
      </div>
      <span>
       Tugas
      </span>
     </a>
     <a href="{{ route('admin.clients.index') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors" href="#">
      <div class="w-5 h-5 flex items-center justify-center rounded bg-gray-300 text-gray-600 text-xs">
       <i class="far fa-credit-card"></i>
      </div>
      <span>
       Data client
      </span>
     </a>
     <a class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors" href="#">
      <div class="w-5 h-5 flex items-center justify-center rounded bg-gray-300 text-gray-600 text-xs">
       <i class="fas fa-plus"></i>
      </div>
      <span>
       Histori Pemesanan
      </span>
     </a>
    </nav>
   </aside>
 
 