@include('components.header', ['uploadData' => 'uploadData / LKS'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" rel="stylesheet">
    <title>Form Upload Laporan</title>
</head>
<body class="bg-gray-100">
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
            <form class="flex flex-col gap-4">
                <!-- Periode Selection -->
                <label class="block text-gray-700 font-bold" for="periode">Periode:</label>
                <select id="periode" class="block w-full text-gray-700 bg-gray-100 border border-gray-300 rounded-lg p-2 focus:outline-none focus:border-blue-500">
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                </select>
                
                <label class="block text-gray-700 font-bold" for="upload">Upload Laporan:</label>
                <div class="flex flex-col gap-6 py-6 lg:flex-row">
                    <div class="flex h-64 w-full flex-col items-center justify-center gap-4 rounded-xl border border-dashed border-gray-300 p-6 text-center">
                        <i class="uil uil-file-upload-alt text-6xl"></i>
                        <p class="text-sm text-gray-600">Jenis file berekstensi .jpg atau .pdf dan maksimal berukuran 100 Mb.</p>
                        <input type="file" class="max-w-full rounded-lg px-4 py-2 font-medium text-blue-600 outline-none ring-blue-600 focus:ring-1" />
                    </div>
                </div>
                
                <!-- Buttons -->
                <div class="flex justify-end mt-4">
                    <a href="/profil" class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
                    <a href="/profil" class="bg-[#08A78B]  text-white px-4 py-2 rounded-lg hover:bg-[#114138]">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@include('components.footer', ['uploadData' => 'uploadData / LKS'])