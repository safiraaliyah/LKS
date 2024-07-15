<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans;
            background-color: #08A78B;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
<div class="text-center text-white font-['Plus Jakarta Sans']">
    <img src="img/404/404.png" alt="404 Image" class="mx-auto mb-8" style="width: 400px;">
    <h1 class="text-4xl text-teal-900 font-bold mb-2">404</h1>
    <p class="text-2xl text-gray-300 font-bold mb-2">Whoops! Halaman Tidak ditemukan.</p>
    <div class="flex justify-center space-x-4">
        <a href="/" class="text-gray-200 hover:underline mt-2 duration-300"> Kembali ke Home?</a>
{{--        <a href="/profil/{id}" class="text-gray-200 hover:underline">Profile</a>--}}
{{--        <a href="#" class="text-gray-200 hover:underline">Notification</a>--}}
    </div>
</div>
</body>
</html>
