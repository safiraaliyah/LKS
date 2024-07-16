 @include('components.header', ['home' => 'home / LKS'])
    <div class="bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h2 class="max-w-2xl mb-4 text-3xl font-bold tracking-tight leading-none text-blue-900">Selamat Datang di Website Resmi</h2>
                <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none text-blue-900 md:text-4xl xl:text-5xl">
                    LEMBAGA KESEJAHTERAAN <br> SOSIAL KOTA YOGYAKARTA
                </h1>
                <p class="max-w-2xl mb-6 font-light text-black lg:mb-8 md:text-lg lg:text-xl">Lembaga Kesejahteraan Sosial (LKS) adalah organisasi sosial atau perkumpulan sosial melaksanakan penyelenggaraan kesejahteraan sosial yang dibentuk oleh masyarakat. Tujuan pendirian LKS sebagai wujud peran masyarakat dalam penyelenggaraan kesejahteraan sosial.</p>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="img/gambar1.jpeg" alt="mockup">
            </div>
        </div>
    </div>

    <div class="bg-gray-100 py-8">
        <div class="max-w-screen-xl mx-auto grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <div class="max-w-full mx-auto lg:col-span-full">
                <h2 class="text-left text-3xl font-extrabold tracking-tight text-gray-900 mb-8">Profil LKS</h2>
            </div>
            @foreach ($profiles as $profile)
            <a href="{{ url('/profile/' . urlencode($profile->nama_lks)) }}" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow mx-auto hover:scale-105">
                <img class="rounded-t-lg w-full" src="img/lks/{{ $profile->foto_lks }}" alt="{{ $profile->nama_lks }}" />
                <div class="p-5 text-center">
                    <div class="flex justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-black" viewBox="0 0 16 16">
                            <path d="M16 8c0 3.866-3.582 7-8 7s-8-3.134-8-7 3.582-7 8-7 8 3.134 8 7zm-8-5a5 5 0 1 0 0 10A5 5 0 0 0 8 3z" />
                            <path d="M8 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            <path d="M8 4.5a.5.5 0 0 0-1 0v3a.5.5 0 0 0 1 0v-3z" />
                        </svg>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $profile->nama_lks }}</h5>
                    <p class="mb-3 font-normal text-gray-700">{{ $profile->alamat_lks }}</p>
                    <hr class="my-4 border-gray-500">
                    <p class="font-normal text-gray-700">Kontak Pengurus: {{ $profile->kontak_pengurus }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    @include('components.footer', ['home' => 'home / LKS'])
