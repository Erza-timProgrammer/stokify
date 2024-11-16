<!DOCTYPE html>
<html class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <div class="flex ms-2 md:me-24">
            <svg width="40px" height="40px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M444 136.3L123.8 324.8l3.2 371.5 323.3 183 320.2-188.5-3.2-371.5z" fill="#FFFFFF" /><path d="M630 287.6l-20.1-11.4-279.7 164.7L333 767l20.1 11.3-2.8-326z" fill="#06F3FF" /><path d="M746.8 489.8l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.7-2.9 6.2-9 3.4-13.7-2.9-4.7-9-6.2-13.8-3.4z" fill="#005BFF" /><path d="M638.6 534c-1.6-0.9-3.4-1.3-5.2-1.3-4.9 0-9.9 2.6-13 4.6-20.6 13-38 47.5-38 75.2 0 12.2 3.4 21.4 9.1 24.5 6 3.3 14-0.6 18.2-3.3 20.6-13 38-47.5 38-75.2 0-12.2-3.4-21.3-9.1-24.5z m-9.9 50.4l-8.6 5.2c-1.6 1-3.4 1.4-5.2 1.4-3.4 0-6.7-1.7-8.6-4.8-2.9-4.7-1.3-10.9 3.4-13.7l8.6-5.2c4.7-2.9 10.9-1.3 13.7 3.4 3 4.7 1.5 10.9-3.3 13.7z" fill="#E6E6E6" /><path d="M618.4 567.3l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.7-2.9 6.2-9 3.4-13.7-2.9-4.7-9.1-6.3-13.8-3.4z" fill="#E6E6E6" /><path d="M444 136.3L123.8 324.8l3.2 371.5 323.3 183 320.1-188.5-3.2-371.5-323.2-183zM166.8 672.9L164 347.6l280.3-165.1 71.2 40.3-280.3 165.1 2.8 325.3-71.2-40.3z m262.8 148.7l-76.5-43.3L333 767l-74.9-42.4-2.8-325.3 280.4-165.1 74.2 42 20.1 11.4 77.8 44-281 165.5 2.8 324.5z m40 0L467 519.8l260.7-153.5 2.6 301.7-260.7 153.6z m287.6-314.7l-8.6 5.2c-1.6 1-3.4 1.4-5.2 1.4-3.4 0-6.7-1.7-8.6-4.8-2.9-4.7-1.3-10.9 3.4-13.7l8.6-5.2c4.7-2.9 10.9-1.3 13.7 3.4 2.9 4.7 1.4 10.9-3.3 13.7z" fill="#005BFF" /><path d="M704 515.6l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.7-2.9 6.2-9 3.4-13.7-2.9-4.7-9-6.2-13.8-3.4zM827.2 430.8c-5.5 0-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10c0-5.5-4.5-10-10-10zM837.2 390.8c0-5.5-4.5-10-10-10s-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10zM837.2 340.8c0-5.5-4.5-10-10-10s-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10zM837.2 290.8c0-5.5-4.5-10-10-10s-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10zM803.4 467.4c-2.9-4.7-9-6.3-13.7-3.4l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.6-2.9 6.1-9 3.3-13.7zM665.3 540.1c-3-10.8-8.9-19.1-17.1-23.6-11.2-6.1-24.8-4.8-38.5 3.9-26.5 16.8-47.3 57.2-47.3 92.1 0 19.9 7.1 35.2 19.5 42 4.6 2.5 9.6 3.8 14.9 3.8 7.5 0 15.6-2.6 23.7-7.7 25.9-16.4 46.4-55.4 47.3-89.7l3.9-2.4c4.7-2.9 6.2-9 3.4-13.7-2.2-3.4-6.1-5.1-9.8-4.7z m-55.6 93.7c-4.2 2.7-12.2 6.6-18.2 3.3-5.7-3.1-9.1-12.3-9.1-24.5 0-27.7 17.4-62.2 38-75.2 3.1-1.9 8.1-4.6 13-4.6 1.8 0 3.6 0.4 5.2 1.3 5.7 3.1 9.1 12.3 9.1 24.5 0 27.7-17.4 62.1-38 75.2z" fill="#005BFF" /><path d="M891.2 321.7c-5.5 0-10 4.5-10 10v156.4l-81.7 49.3c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l91.4-55.1V331.7c-0.1-5.5-4.6-10-10.1-10zM817.3 239.6c-0.1 0.4-0.1 0.8-0.1 1.3v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10c0-0.4 0-0.9-0.1-1.3 23.4-4.6 41-25.3 41-50 0-28.2-22.8-51-51-51s-51 22.8-51 51c0 24.7 17.7 45.4 41.2 50z" fill="#005BFF" /></svg>
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Admin Dashboard</span>
      </div>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <!-- mode darkmode -->
              <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                  <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                  </svg>
                  <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                  </svg>
              </button>
              <!-- Profile -->
            <div class="ml-4">
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
              </button>
            </div>
            <!-- dropdown -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  {{$name}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                {{$email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('admin.menu.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"/>
            <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"/>
            </svg>

               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.menu.product') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
            </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">Product</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.menu.report') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Report</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.menu.setting') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M10.83 5a3.001 3.001 0 0 0-5.66 0H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17ZM4 11h9.17a3.001 3.001 0 0 1 5.66 0H20a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H4a1 1 0 1 1 0-2Zm1.17 6H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17a3.001 3.001 0 0 0-5.66 0Z"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Setting</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.menu.stock') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M4 4a2 2 0 1 0 0 4h16a2 2 0 1 0 0-4H4Zm0 6h16v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8Zm10.707 5.707a1 1 0 0 0-1.414-1.414l-.293.293V12a1 1 0 1 0-2 0v2.586l-.293-.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l2-2Z" clip-rule="evenodd"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Stock</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.menu.supplier') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Supplier</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.menu.user') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">User</span>
            </a>
         </li>
         <div class="flex justify-center">
             <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="flex mt-10 items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-md text-sm font-medium text-white"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>Logout</button>
           </form>
          </div>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
    @yield('content')
</div>
<!-- darkmode start-->
   <script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
        // toggle icons
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if is set in localStorage
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });
</script>
<!-- darkmode end-->
</body>
</html>



