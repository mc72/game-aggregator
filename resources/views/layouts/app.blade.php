<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Games</title>
  @livewireStyles
  <link rel="stylesheet" href="/css/main.css">
</head>
<body class="text-white bg-gray-900">
  <header class="border-b border-gray-800">
    <nav class="container flex flex-col items-center justify-between px-4 py-6 mx-auto lg:flex-row">
      <div class="flex flex-col items-center lg:flex-row">
        <a href="/">
          <img src="/img/laracasts-logo.svg" alt="" class="flex-none w-32">
        </a>

        <ul class="flex my-6 ml-0 space-x-8 lg:ml-16 lg:my-0">
            <li><a href="#" class="hover:text-gray-400">Games</a></li>
            <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
            <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
        </ul>
    </div>
    <div class="flex items-center">
        <div class="relative">
        <input type="text" class="w-64 px-3 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline" placeholder="Search...">
        <div class="absolute top-0 flex items-center h-full ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="inline-block w-6 pr-2 text-gray-400 fill-current"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
        </div>
        </div>
        <div class="ml-6">
            <a href="#"><img src="/img/avatar.svg" alt="avatar" class="w-8 rounded-full"/></a>
        </div>
    </div>
    </nav>
  </header>
  <main class="py-8">
      @yield('content')
  </main>
  <footer class="border-t border-gray-800">
      <div class="container px-4 py-6 mx-auto">
          Powered By <a href="#" class="underline hover:text-gray-400">IGDB API</a>
      </div>
  </footer>
  @livewireScripts
</body>
</html>
