@include('components.header', ['editProfil' => 'editProfil / LKS'])
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>
        <form id="editProfileForm" action="{{ route('updateProfil', $profil->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Upload Foto (.JPG, .SVG, .RAW)</label>
                <div class="md:col-span-2">
                    <input type="file" name="foto" accept=".jpg,.svg,.raw" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Nama LKS</label>
                <div class="md:col-span-2">
                    <input type="text" name="nama" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('nama', $profil->nama) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Ketua LKS</label>
                <div class="md:col-span-2">
                    <input type="text" name="ketua" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('ketua', $profil->ketua) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Alamat LKS</label>
                <div class="md:col-span-2">
                    <input type="text" name="alamat" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('alamat', $profil->alamat) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-2 text-gray-700">Nomor & Tanggal Akte Notaris</label>
                <div class="md:col-span-2 space-y-2">
                    <input type="text" name="nomor_notaris" placeholder="Nomor Notaris" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('nomor_notaris', $profil->nomor_notaris) }}">
                    <input type="date" name="tanggal_notaris" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('tanggal_notaris', \Carbon\Carbon::parse($profil->tanggal_notaris)->format('Y-m-d')) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Nomor & Tanggal Tanda Daftar</label>
                <div class="md:col-span-2 space-y-2">
                    <input type="text" name="nomor_daftar" placeholder="Nomor Daftar" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('nomor_daftar', $profil->nomor_daftar) }}">
                    <input type="datetime-local" name="tanggal_daftar" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('tanggal_daftar', \Carbon\Carbon::parse($profil->tanggal_daftar)->format('Y-m-d\TH:i')) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Kontak Pengurus</label>
                <div class="md:col-span-2">
                    <input type="text" name="kontak" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('kontak', $profil->kontak) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Akreditasi</label>
                <div class="md:col-span-2">
                    <input type="text" name="akreditasi" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('akreditasi', $profil->akreditasi) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Jenis LKS</label>
                <div class="md:col-span-2">
                    <select name="jenis_lks" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="LKS Kota" {{ old('jenis_lks', $profil->jenis_lks) == 'LKS Kota' ? 'selected' : '' }}>LKS Kota</option>
                        <option value="LKS Provinsi" {{ old('jenis_lks', $profil->jenis_lks) == 'LKS Provinsi' ? 'selected' : '' }}>LKS Provinsi</option>
                        <option value="LKS Nasional" {{ old('jenis_lks', $profil->jenis_lks) == 'LKS Nasional' ? 'selected' : '' }}>LKS Nasional</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
                <label class="md:text-left pr-4 text-gray-700">Jenis Pelayanan</label>
                <div class="md:col-span-2">
                    <select name="jenis_pelayanan" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="Anak" {{ old('jenis_pelayanan', $profil->jenis_pelayanan) == 'Anak' ? 'selected' : '' }}>Anak</option>
                        <option value="Disabilitas" {{ old('jenis_pelayanan', $profil->jenis_pelayanan) == 'Disabilitas' ? 'selected' : '' }}>Disabilitas</option>
                        <option value="Lanjut Usia" {{ old('jenis_pelayanan', $profil->jenis_pelayanan) == 'Lanjut Usia' ? 'selected' : '' }}>Lanjut Usia</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ url('/profil/' . $profil->id) }}" class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="button" id="submitButton" class="bg-[#08A78B] text-white px-4 py-2 rounded-lg hover:bg-[#114138]">Simpan</button>
            </div>
        </form>
    </div>

    <!-- The Modal -->
    <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-xl font-bold mb-4">Simpan Perubahan?</h2>
            <p>Apakah Anda yakin ingin menyimpan perubahan ini?</p>
            <div class="flex justify-end mt-4">
                <button id="cancelButton" class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</button>
                <button id="confirmButton" class="bg-[#08A78B] text-white px-4 py-2 rounded-lg hover:bg-[#114138]">Simpan</button>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("confirmationModal");

        // Get the button that opens the modal
        var btn = document.getElementById("submitButton");

        // Get the buttons that close the modal
        var cancelButton = document.getElementById("cancelButton");
        var confirmButton = document.getElementById("confirmButton");

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.classList.remove('hidden');
        }

        // When the user clicks on cancel button, close the modal
        cancelButton.onclick = function() {
            modal.classList.add('hidden');
        }

        // When the user clicks on confirm button, submit the form
        confirmButton.onclick = function() {
            document.getElementById("editProfileForm").submit();
        }

        // Close the modal if user clicks outside of the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.classList.add('hidden');
            }
        }
    </script>
</body>
</html>

@include('components.footer', ['editProfil' => 'editProfil / LKS'])
