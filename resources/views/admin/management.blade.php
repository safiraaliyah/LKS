@include('admin.headerAdmin', ['Management' => 'Management / LKS'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="flex items-center justify-between pb-6">
                <h1 class="font-semibold text-gray-700 text-2xl">Management</h1>
            </div>
            <div class="pb-6 flex items-center">
                <span class="mr-2">Search Name:</span>
                <div class="relative">
                    <input type="text" placeholder="Search name" class="w-64 px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-emerald-800 bg-emerald-50">
                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="uil uil-search"></i>
                    </span>
                </div>
            </div>
                       
            <div class="overflow-hidden rounded-lg border">
                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-emerald-50 text-left text-sm font-semibold uppercase tracking-wider text-black">
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Operations</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-base">
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200 bg-white">
                                    <p class="whitespace-no-wrap">Panti Wreda "Hanna" Yogyakarta</p>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 bg-white">
                                    <a href="#" class="text-gray-600 hover:text-gray-800 mr-2">
                                        <i class="uil uil-edit text-xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-600 hover:text-gray-800">
                                        <i class="uil uil-trash-alt text-xl"></i>
                                    </a>
                                </td>
                                
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

