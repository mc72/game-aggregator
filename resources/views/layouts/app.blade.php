<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laracasts Video Games</title>
  <link rel="stylesheet" href="/css/main.css">
  @livewireStyles
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
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
        <livewire:search-dropdown>
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
  <script src="/js/app.js"></script>
  @stack('scripts')
</body>
</html>
