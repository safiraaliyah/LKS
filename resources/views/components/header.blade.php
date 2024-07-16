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
    }
  </style>
</head>
<body x-data="{ openProfile: false, openLogin: false, openUser: false, openNotif: false }" class="bg-gray-100">
<nav class="fixed top-0 right-0 w-screen z-50 flex bg-[#08A78B] text-white justify-between py-4 px-8 items-center">
  <a href="/">
    <img src="img/logo_kota.png" alt="logo" class="w-12">
  </a>

  {{--  Links--}}
  <ul class="flex gap-8 items-center">
    <li>
      <a href="/">Home</a>
    </li>
    @if(Auth::user() && Auth::user()->role == 'lks')
      <li class="relative">
        <button @click="openProfile = !openProfile; openUser = false">Profile <i class="uil uil-angle-down"></i></button>
        <ul x-show="openProfile" class="absolute text-center z-50 rounded-lg text-black shadow-md flex flex-col gap-2 py-4 px-4 bg-white w-40 top-10 right-0">
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
      <li class="relative">
        <button @click="openUser = !openUser; openProfile = false" class="flex items-center gap-2 rounded-full bg-white text-black py-2 px-4 font-semibold duration-150 hover:text-gray-700">{{ Auth::user()->name }} <img src="img/icon/user-icon.png" alt=""></button>
        <ul x-show="openUser" class="absolute z-50 rounded-lg text-black top-14 right-0 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
          <li class="flex flex-col gap-4">
            <div class="flex gap-2 items-center">
              <img src="img/icon/user-icon.png" alt="">
              {{ Auth::user()->name }}
            </div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="flex justify-center items-center w-full gap-2 bg-gray-300 px-8 py-1 border border-black rounded-full text-left w-full hover:text-gray-600 duration-150 font-medium">
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
        <a href="/management">Management</a>
      </li>
      <li class="relative">
        <button @click="openUser = !openUser" class="rounded-full flex items-center gap-2 bg-white text-black py-2 px-4 font-semibold duration-150 hover:text-gray-700">{{ Auth::user()->name }} <img src="img/icon/user-icon.png" alt=""></button>
        <ul x-show="openUser" class="absolute z-50 rounded-lg text-black top-14 right-0 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
          <li class="flex flex-col gap-4">
            <div class="flex gap-2 items-center">
              <img src="img/icon/user-icon.png" alt="">
              {{ Auth::user()->name }}
            </div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="flex justify-center items-center gap-2 bg-gray-300 px-8 py-1 border border-black rounded-full w-[10rem] text-left hover:text-gray-600 duration-150 font-medium">
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
        <button @click="openLogin = !openLogin; openProfile = false">Login <i class="uil uil-angle-down"></i></button>
        <ul x-show="openLogin" class="absolute text-center rounded-lg z-50 text-black top-10 right-0 w-40 shadow-md flex flex-col gap-2 py-4 px-4 bg-white">
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
      <li class="">
        <button @click="openNotif = !openNotif">
          <img src="img/icon/notif_icon.png" alt="" class="w-2/3">
        </button>
      </li>
    @endif
  </ul>
</nav>

@if (Auth::user() && Auth::user()->role == 'lks')
<aside x-show="openNotif" @click.away="openNotif = false" class="fixed min-h-screen w-96 top-0 right-0 shadow-md overflow-y-auto bg-[#D9D9D9] px-4">

  <div class="p-4 relative min-h-screen">

    <div class=" bg-white rounded-b-lg min-h-fit w-full font-semibold absolute right-0 top-24 text-black p-4 flex flex-col justify-center items-center gap-2">
      <span>Notifikasi</span>
    </div>


    <!-- Add your notification items here -->
    @if (\Carbon\Carbon::now()->diffInDays(\App\Models\LKS::where('id_user', Auth::user()->id)->first()->kontrak_akhir) <= 30)
    <div class="mt-2 bg-white rounded-lg min-h-fit w-full absolute right-0 bottom-6 text-black p-4 flex flex-col gap-2">
      <div class="flex items-center gap-4">
        <img src="img/logo_kota.png" alt="logo kota" class="w-10">
        <div class="flex flex-col">
          <span class="font-bold">Login LKS</span>
          <span class="text-[12px] text-gray-500">{{ \Carbon\Carbon::now()->format('l, d F Y H:i:s') }}</span>
        </div>
      </div>
      <hr>
      <p class="text-center text-sm">
        Hai [{{ Auth::user()->name }}], izin operasional LKS Anda akan habis dalam satu bulan lagi. Mohon untuk memperpanjang izin operasional sebelum masa berlaku habis. 😔
      </p>
    </div>
    @else
      <div class="mt-2 bg-white rounded-lg min-h-fit w-full absolute right-0 bottom-6 text-black p-4 flex flex-col gap-2">
        <div class="flex items-center gap-4">
          <img src="img/logo_kota.png" alt="logo kota" class="w-10">
          <div class="flex flex-col">
            <span class="font-bold">Login LKS</span>
            <span class="text-[12px] text-gray-500">{{ \Carbon\Carbon::now()->format('l, d F Y H:i:s') }}</span>
          </div>
        </div>
        <hr>
        <p class="text-center text-sm">
          Hai [{{ Auth::user()->name }}], Belum ada notifikasi untuk anda. 🥰
        </p>
      </div>
    @endif
  </div>
</aside>
@endif
