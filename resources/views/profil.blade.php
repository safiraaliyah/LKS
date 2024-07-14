@include('components.header', ['profil' => 'profil / LKS'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profil->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unicons.iconscout.com/release/v4.0.0/css/line.css' rel='stylesheet'>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Bagian Profil -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
            <div class="flex flex-col md:flex-row items-center">
                @if ($profil->image)
                    <img src="{{ Storage::url($profil->image) }}" alt="{{ $profil->nama }}" class="w-full md:w-1/2 h-64 object-cover rounded-lg mb-6 md:mb-0 md:mr-8">
                @else
                    <img src="{{ asset('panti3.jpg') }}" alt="{{ $profil->nama }}" class="w-full md:w-1/2 h-64 object-cover rounded-lg mb-6 md:mb-0 md:mr-8">
                @endif
                <div class="w-full md:w-1/2">
                    <h1 class="text-3xl font-bold mb-4">{{ $profil->nama }}</h1>
                    <p class="text-lg flex items-center mb-2"><i class="uil uil-user mr-2"></i><strong>Ketua LKS:</strong> {{ $profil->ketua }}</p>
                    <p class="text-lg flex items-center mb-2"><i class="uil uil-map-marker mr-2"></i><strong>Alamat LKS:</strong> {{ $profil->alamat }}</p>
                    <p class="text-lg flex items-center mb-2"><i class="uil uil-phone mr-2"></i><strong>Kontak Pengurus:</strong> {{ $profil->kontak }}</p>
                </div>
            </div>
        </div>

        <!-- Bagian Tentang -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">About</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-lg"><strong>Nomor & Tanggal Akte Notaris:</strong><br>{{ $profil->nomor_notaris }}, Tanggal: {{ \Carbon\Carbon::parse($profil->tanggal_notaris)->format('d F Y') }}</p>
                    <p class="text-lg"><strong>Nomor & Tanggal Tanda Daftar:</strong><br>{{ $profil->nomor_daftar }}, Tanggal: {{ \Carbon\Carbon::parse($profil->tanggal_daftar)->format('d F Y H:i') }}</p>
                    <p class="text-lg"><strong>Akreditasi:</strong><br>{{ $profil->akreditasi }}</p>
                </div>
                <div>
                    <p class="text-lg"><strong>Jenis LKS:</strong><br>{{ $profil->jenis_lks }}</p>
                    <p class="text-lg"><strong>Jenis Pelayanan:</strong><br>{{ $profil->jenis_pelayanan }}</p>
                </div>
            </div>
        </div>
        
        <!-- Tombol Edit Profil dan Kembali -->
        <div class="flex justify-center mt-6 space-x-4">
            <a href="{{ url('/editProfil/' . $profil->id) }}" class="bg-[#08A78B] hover:bg-[#114138] text-white font-bold py-2 px-4 rounded">
                Edit Profile
            </a>
            <a href="{{ url('/') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </div>
</body>
</html>
@include('components.footer', ['profil' => 'profil / LKS'])
