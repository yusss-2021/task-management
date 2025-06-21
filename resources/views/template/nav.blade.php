<nav class="navbar-vertical navbar">
    <div id="myScrollableElement" class="h-screen" data-simplebar>
        <!-- brand logo -->
  <a class="navbar-brand" href="./index.html">
     <img src="assets/images/brand/logo/logo.svg" alt="" />
  </a>

  <!-- navbar nav -->
  <ul class="navbar-nav flex-col" id="sideNavbar">
     {{-- Untuk Admin --}}
     <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i data-feather="home" class="w-4 h-4 mr-2"></i>
            Dashboard
      </a>
   </li>

     <!-- nav item -->
     <li class="nav-item">
        <div class="navbar-heading">Tugas</div>
     </li>
     <!-- nav item -->
     <li class="nav-item">
      <a class="nav-link " href="{{ route('admin.tasks.index') }}">
         <i data-feather="sidebar" class="w-4 h-4 mr-2"></i>
        Daftar tugas
      </a>
   </li>
     <li class="nav-item">
      <a class="nav-link " href="{{ route('admin.clients.index') }}">
         <i data-feather="sidebar" class="w-4 h-4 mr-2"></i>
         Data Customer 
      </a>
   </li>
 
   <li class="nav-item">
      <a class="nav-link " href="{{ route('admin.history') }}">
         <i data-feather="sidebar" class="w-4 h-4 mr-2"></i>
         Histori Pemesanan
      </a>
   </li>
  </ul>
</div>
</nav>