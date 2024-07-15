<!DOCTYPE html>
<html lang="en">
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
<body x-data="{ openProfile: false, openLogin: false, openUser: false }">
<nav class="flex bg-[#08A78B] text-white justify-between py-4 px-8 items-center">
  <a href="/">
    <img src="img/logo_kota.png" alt="logo" class="w-12">
  </a>

  {{--  Links--}}
  <ul class="flex gap-8 relative items-center">
    <li>
      <a href="/">Home</a>
    </li>
    @if(Auth::user() && Auth::user()->role == 'lks')
      <li>
        <button @click="openProfile = !openProfile; openUser = false">Profile <i class="uil uil-angle-down"></i></button>
        <ul x-show="openProfile" class="absolute rounded-lg text-black top-[70px] right-40 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
          <li>
            <a href="/profile">Profile LKS</a>
          </li>
          <hr>
          <li>
            <a href="/form-lks">Form Data LKS</a>
          </li>
          <hr>
          <li>
            <a href="/form-data">Form Upload Data</a>
          </li>
        </ul>
      </li>
      <li>
        <button @click="openUser = !openUser; openProfile = false" class="flex items-center gap-2 rounded-full bg-white text-black py-2 px-4 font-semibold duration-150 hover:text-gray-700">{{ Auth::user()->name }} <img src="img/icon/user-icon.png" alt=""></button>
        <ul x-show="openUser" class="absolute rounded-lg text-black top-[70px] right-8 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
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

      <li>
        <a href="/history">History</a>
      </li>
      <li>
        <a href="">Management</a>
      </li>
      <li>
        <button @click="openUser = !openUser" class="rounded-full flex items-center gap-2 bg-white text-black py-2 px-4 font-semibold duration-150 hover:text-gray-700">{{ Auth::user()->name }} <img src="img/icon/user-icon.png" alt=""></button>
        <ul x-show="openUser" class="absolute rounded-lg text-black top-[70px] right-0 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
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
    @endif

    @if(!Auth::user())
      <li>
        <button @click="openLogin = !openLogin; openProfile = false">Login <i class="uil uil-angle-down"></i></button>
        <ul x-show="openLogin" class="absolute text-black top-16 -right-4 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
          <li>
            <a href="/login-admin">Login Admin</a>
          </li>
          <hr>
          <li>
            <a href="/login-lks">Login LKS</a>
          </li>
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
</nav>
