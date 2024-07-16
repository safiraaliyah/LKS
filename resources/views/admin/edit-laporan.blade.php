@include('components.header', ['profile' => 'profil / LKS'])
<div class="my-8 max-w-screen-lg mx-auto border px-6 py-8 shadow-xl rounded-xl bg-white">
  <!-- Header -->
  <div class="py-4">
    <h2 class="text-2xl font-bold text-gray-800">Form Upload Laporan</h2>
    <p class="mt-2 text-gray-600">
      Sebelum mengunggah file, mohon <strong>PERHATIKAN</strong> petunjuk atau perintah yang telah diberikan.
    </p>

  </div>

  <!-- Form Section -->
  <div class="my-4 border px-6 py-6 shadow-lg rounded-xl bg-gray-50">
    <!-- Form Upload Laporan -->
    <form class="flex flex-col gap-4" method="POST" enctype="multipart/form-data" action="/update-laporan">
      @csrf
      <input type="hidden" name="id" value="{{base64_encode($report->id)}}">
      <!-- Periode Selection -->
      <label class="block text-gray-700 font-bold" for="periode">Periode:</label>
      <select id="periode" name="periode" class="block w-full text-gray-700 bg-gray-100 border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
        <option value="Triwulan 1" {{ 'Triwulan 1' == $report->periode ? 'selected' : ''  }}>Triwulan 1</option>
        <option value="Triwulan 2" {{ 'Triwulan 2' == $report->periode ? 'selected' : ''  }}>Triwulan 2</option>
        <option value="Triwulan 3" {{ 'Triwulan 3' == $report->periode ? 'selected' : ''  }}>Triwulan 3</option>
        <option value="Triwulan 4" {{ 'Triwulan 4' == $report->periode ? 'selected' : ''  }}>Triwulan 4</option>

      </select>

      <!-- Year Selection -->
      <label class="block text-gray-700 font-bold" for="year">Tahun:</label>
      <select id="year" name="year" class="block w-full text-gray-700 bg-gray-100 border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
        @for($i = 2010; $i <= 2035; $i++)
        <option value="{{$i}}" {{ $i == $report->year ? 'selected' : ''  }}>{{$i}}</option>
        @endfor
      </select>

      <label class="block text-gray-700 font-bold" for="upload">Upload Laporan:</label>
      <div class="flex flex-col gap-6 py-6 lg:flex-row">
        <div class="flex h-64 w-full flex-col items-center justify-center gap-4 rounded-xl border border-dashed border-gray-300 p-6 text-center">
          <i class="uil uil-file-upload-alt text-6xl"></i>
          <p class="text-sm text-gray-600">Jenis file berekstensi .docx atau .pdf dan maksimal berukuran 100 Mb.</p>
          <input type="file" name="laporan" class="max-w-full rounded-lg px-4 py-2 font-medium text-blue-600 outline-none ring-blue-600 focus:ring-1" />
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end mt-4">
        <a href="/history" class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
        <button type="submit" class="bg-[#08A78B]  text-white px-4 py-2 rounded-lg hover:bg-[#114138]">Simpan</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
@include('components.footer', ['uploadData' => 'uploadData / LKS'])