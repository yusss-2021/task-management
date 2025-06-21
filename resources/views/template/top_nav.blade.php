<div id="app-layout-content" class="min-h-screen w-full min-w-[100vw] md:min-w-0 ml-[15.625rem] [transition:margin_0.25s_ease-out]">
    <div class="header">
    <!-- navbar -->
    <nav class="bg-white px-6 py-[10px] flex items-center justify-between shadow-sm">
        <a id="nav-toggle" href="#" class="text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </a>
        <div class="ml-3 hidden md:hidden lg:block">
            <!-- form -->
            <form class="flex items-center">
                <input
                type="search"
                class="border border-gray-300 text-gray-900 rounded focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Search" />
            </form>
        </div>
        <!-- navbar nav -->
        <ul class="flex ml-auto items-center">
            <li class="dropdown ml-2">
                <a class="rounded-full" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="w-10 h-10 relative">
                    <img alt="avatar" src="./assets/images/avatar/avatar-1.jpg" class="rounded-full" />
                    <div class="absolute border-gray-200 border-2 rounded-full right-0 bottom-0 bg-green-600 h-3 w-3"></div>
                </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="dropdownUser">
                <ul class="list-unstyled">
                    <li>
                        
                        <a href="#" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="dropdown-item w-full text-left">
                         <i class="w-4 h-4" data-feather="power"></i>
                         Sign Out
                     </a>
                    
                       
                    </li>                 
                </ul>
                </div>
            </li>
        </ul>
    </nav>