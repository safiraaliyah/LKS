@include('components.header', ['History' => 'History / LKS'])
<div class="max-w-screen-xl mx-auto p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <div class="flex items-center justify-between pb-6">
            <h1 class="font-semibold text-gray-700 text-2xl">Management</h1>
        </div>
        <div class="pb-6 flex items-center">
            <span class="mr-2">Search Name:</span>
            <div class="relative">
                <form method="GET" action="{{ route('management.index') }}" class="flex items-center">
                    <input type="text" name="search" placeholder="Search name" value="{{ request('search') }}" class="w-64 px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-emerald-800 bg-emerald-50 mr-2">
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-800">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div class="overflow-hidden rounded-lg border">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-emerald-50 text-left text-sm font-semibold uppercase tracking-wider text-black">
                            <th class="px-6 py-4">Foto</th>
                            <th class="px-6 py-4">Nama LKS</th>
                            <th class="px-6 py-4">Operations</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-base">
                        @forelse($lks as $l)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white w-40">
                                <img src="img/lks/{{$l->foto_lks}}" alt="" class="w-24">
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white w-screen">
                                <p class="whitespace-no-wrap">{{$l->nama_lks}}</p>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white flex">
                                <a href="#" class="text-gray-600 hover:text-gray-800 mr-2">
                                    <i class="uil uil-edit text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-600 hover:text-gray-800">
                                    <i class="uil uil-trash-alt text-xl"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="3">
                                Data Belum Ada
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>
