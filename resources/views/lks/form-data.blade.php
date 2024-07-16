@include('components.header', ['profile' => 'profil / LKS'])

<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
  <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>
  <form id="editProfileForm" action="/form-data-lks" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <img src="img/lks/{{ $profile->foto_lks }}" alt="" class="rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Upload Foto (.JPG, .SVG, .RAW)</label>
      <div class="md:col-span-2">
        <input type="file" name="foto_lks" accept=".jpg,.svg,.raw" class="w-full p-2 border border-gray-300 rounded-lg">
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Nama LKS</label>
      <div class="md:col-span-2">
        <input type="text" name="nama_lks" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->nama_lks }}">
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Ketua LKS</label>
      <div class="md:col-span-2">
        <input type="text" name="ketua_lks" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->ketua_lks }}">
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Alamat LKS</label>
      <div class="md:col-span-2">
        <textarea name="alamat_lks" class="w-full p-2 border border-gray-300 rounded-lg" rows="3">{{ $profile->alamat_lks }}</textarea>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-2 text-gray-700">Nomor & Tanggal Akte Notaris</label>
      <div class="md:col-span-2 space-y-2">
        <input type="text" name="nomor_notaris" placeholder="Nomor Notaris" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->nomor_notaris }}">
        <input type="datetime-local" name="tanggal_akte_notaris" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->tanggal_akte_notaris }}">
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Nomor & Tanggal Tanda Daftar</label>
      <div class="md:col-span-2 space-y-2">
        <input type="datetime-local" name="kontrak_awal" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->kontrak_awal }}">
        <input type="datetime-local" name="kontrak_akhir" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->kontrak_akhir }}">
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Kontak Pengurus</label>
      <div class="md:col-span-2">
        <input type="text" name="kontak_pengurus" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ $profile->kontak_pengurus }}">
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Akreditasi</label>
      <div class="md:col-span-2">
        <select name="akreditasi_lks" class="w-full p-2 border border-gray-300 rounded-lg">
          <option value="A" {{ $profile->akreditasi_lks == 'A' ? 'selected' : '' }}>A</option>
          <option value="B" {{ $profile->akreditasi_lks == 'B' ? 'selected' : '' }}>B</option>
          <option value="C" {{ $profile->akreditasi_lks == 'C' ? 'selected' : '' }}>C</option>
        </select>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Jenis LKS</label>
      <div class="md:col-span-2">
        <select name="jenis_lks" class="w-full p-2 border border-gray-300 rounded-lg">
          <option value="LKS Kota" {{ $profile->jenis_lks == 'LKS Kota' ? 'selected' : '' }}>LKS Kota</option>
          <option value="LKS Provinsi" {{ $profile->jenis_lks == 'LKS Provinsi' ? 'selected' : '' }}>LKS Provinsi</option>
          <option value="LKS Nasional" {{ $profile->jenis_lks == 'LKS Nasional' ? 'selected' : '' }}>LKS Nasional</option>
        </select>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4">
      <label class="md:text-left pr-4 text-gray-700">Jenis Pelayanan</label>
      <div class="md:col-span-2">
        <select name="jenis_pelayanan" class="w-full p-2 border border-gray-300 rounded-lg">
          <option value="Anak" {{ $profile->jenis_pelayanan == 'Anak' ? 'selected' : '' }}>Anak</option>
          <option value="Disabilitas" {{ $profile->jenis_pelayanan == 'Disabilitas' ? 'selected' : '' }}>Disabilitas</option>
          <option value="Lanjut Usia" {{ $profile->jenis_pelayanan == 'Lanjut Usia' ? 'selected' : '' }}>Lanjut Usia</option>
        </select>
      </div>
    </div>
    <div class="flex justify-end mt-4">
      <a href="/profile" class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
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
      <button type="submit" id="confirmButton" class="bg-[#08A78B] text-white px-4 py-2 rounded-lg hover:bg-[#114138]">Simpan</button>
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
