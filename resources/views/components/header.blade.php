<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lembaga Kesejahteraan Sosial</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #ffffff;
    }
  </style>
</head>
<body x-data="{ openProfile: false, openLogin: false, openUser: false, openMenu: false }" class="bg-gray-100">

  <nav class="bg-[#08A78B] text-white py-4 px-8 md:px-12 flex items-center justify-between relative">
    <!-- Logo -->
    <a href="/">
      <img src="{{ asset('img/logo_kota.png') }}" alt="logo" class="w-12">
    </a>

    <!-- Mobile Menu Button -->
    <button @click="openMenu = !openMenu" class="md:hidden text-white focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex gap-8 items-center">
      <li>
        <a href="/">Home</a>
      </li>
      @if(Auth::user() && Auth::user()->role == 'lks')
        <li class="relative">
          <button @click="openProfile = !openProfile; openUser = false" class="flex items-center gap-2">Profile <i class="uil uil-angle-down"></i></button>
          <ul x-show="openProfile" @click.away="openProfile = false" class="absolute text-center z-50 rounded-lg text-black shadow-md flex flex-col gap-2 py-4 px-4 bg-white w-40 top-10 right-0">
            <li><a href="/profile">Profile LKS</a></li>
            <hr>
            <li><a href="/form-lks">Form Data LKS</a></li>
            <hr>
            <li><a href="/form-data">Form Upload Data</a></li>
          </ul>
        </li>
        <li class="relative">
          <button @click="openUser = !openUser; openProfile = false" class="flex items-center gap-2 rounded-full bg-white text-black py-2 px-4 font-semibold duration-150 hover:text-gray-700">
            {{ Auth::user()->name }} <img src="img/icon/user-icon.png" alt="">
          </button>
          <ul x-show="openUser" @click.away="openUser = false" class="absolute z-50 rounded-lg text-black top-14 right-0 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
            <li class="flex flex-col gap-4">
              <div class="flex gap-2 items-center">
                <img src="img/icon/user-icon.png" alt="">
                {{ Auth::user()->name }}
              </div>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-gray-300 px-8 py-1 border border-black rounded-full text-left w-full hover:text-gray-600 duration-150 font-medium">
                  <img src="img/icon/logout-icon.png" alt="">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      @elseif (Auth::user() && Auth::user()->role == 'admin')
        <li><a href="/history">History</a></li>
        <li><a href="/management">Management</a></li>
        <li class="relative">
          <button @click="openUser = !openUser" class="rounded-full flex items-center gap-2 bg-white text-black py-2 px-4 font-semibold duration-150 hover:text-gray-700">
            {{ Auth::user()->name }} <img src="{{ asset('img/icon/user-icon.png') }}" alt="">
          </button>
          <ul x-show="openUser" @click.away="openUser = false" class="absolute z-50 rounded-lg text-black top-14 right-0 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
            <li class="flex flex-col gap-4">
              <div class="flex gap-2 items-center">
                <img src="{{ asset('img/icon/user-icon.png') }}" alt="">
                {{ Auth::user()->name }}
              </div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-gray-300 px-8 py-1 border border-black rounded-full text-left w-full hover:text-gray-600 duration-150 font-medium">
                  <img src="img/icon/logout-icon.png" alt="">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      @endif

      @if(!Auth::user())
        <li class="relative">
          <button @click="openLogin = !openLogin; openProfile = false" class="flex items-center gap-2">Login <i class="uil uil-angle-down"></i></button>
          <ul x-show="openLogin" @click.away="openLogin = false" class="absolute text-center rounded-lg z-50 text-black top-10 right-0 w-40 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
            <li><a href="/login-admin">Login Admin</a></li>
            <hr>
            <li><a href="/login-lks">Login LKS</a></li>
          </ul>
        </li>
      @endif

      @if (Auth::user() && Auth::user()->role == 'lks')
        <li>
          <button>
            <img src="img/icon/notif_icon.png" alt="" class="w-2/3">
          </button>
        </li>
      @endif
    </ul>

    <!-- Mobile Menu -->
    <div x-show="openMenu" @click.away="openMenu = false" class="md:hidden absolute top-16 left-0 w-full bg-[#08A78B] text-white flex flex-col items-center gap-4 py-4 px-8">
      <a href="/" class="hover:text-gray-200">Home</a>

      @if(Auth::user() && Auth::user()->role == 'lks')
        <button @click="openProfile = !openProfile; openUser = false" class="w-full text-left hover:text-gray-200">Profile <i class="uil uil-angle-down"></i></button>
        <ul x-show="openProfile" class="flex flex-col items-start gap-2 py-4 px-4 w-full bg-[#06a76b] rounded-lg">
          <li><a href="/profile" class="hover:text-gray-200">Profile LKS</a></li>
          <li><a href="/form-lks" class="hover:text-gray-200">Form Data LKS</a></li>
          <li><a href="/form-data" class="hover:text-gray-200">Form Upload Data</a></li>
        </ul>
        <button @click="openUser = !openUser; openProfile = false" class="w-full text-left hover:text-gray-200">{{ Auth::user()->name }}</button>
        <ul x-show="openUser" class="flex flex-col items-start gap-2 py-4 px-4 w-full bg-[#06a76b] rounded-lg">
          <li class="flex items-center gap-2">
            <img src="img/icon/user-icon.png" alt="">
            {{ Auth::user()->name }}
          </li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 bg-gray-300 px-8 py-1 border border-black rounded-full text-left w-full hover:text-gray-600 duration-150 font-medium">
              <img src="img/icon/logout-icon.png" alt="">
              Logout
            </button>
          </form>
        </ul>
      @elseif (Auth::user() && Auth::user()->role == 'admin')
        <a href="/history" class="hover:text-gray-200">History</a>
        <a href="/management" class="hover:text-gray-200">Management</a>
        <button @click="openUser = !openUser" class="w-full text-left hover:text-gray-200">{{ Auth::user()->name }}</button>
        <ul x-show="openUser" class="flex flex-col items-start gap-2 py-4 px-4 w-full bg-[#06a76b] rounded-lg">
          <li class="flex items-center gap-2">
            <img src="img/icon/user-icon.png" alt="">
            {{ Auth::user()->name }}
          </li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 bg-gray-300 px-8 py-1 border border-black rounded-full text-left w-full hover:text-gray-600 duration-150 font-medium">
              <img src="img/icon/logout-icon.png" alt="">
              Logout
            </button>
          </form>
        </ul>
      @endif

      @if(!Auth::user())
        <button @click="openLogin = !openLogin; openProfile = false" class="w-full text-center hover:text-gray-200">Login <i class="uil uil-angle-down"></i></button>
        <ul x-show="openLogin" class="flex flex-col items-start gap-2 py-4 px-4 w-full bg-[#06a76b] rounded-lg">
          <li><a href="/login-admin" class="hover:text-gray-200">Login Admin</a></li>
          <li><a href="/login-lks" class="hover:text-gray-200">Login LKS</a></li>
        </ul>
      @endif

      @if (Auth::user() && Auth::user()->role == 'lks')
        <button>
          <img src="img/icon/notif_icon.png" alt="" class="w-2/3">
        </button>
      @endif
    </div>
  </nav>

</body>
</html>
