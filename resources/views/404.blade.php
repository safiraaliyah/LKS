<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#08A78B] flex items-center justify-center h-screen">
    <div class="text-center text-white font-serif">
        <img src="{{ asset('404.png') }}" alt="404 Image" class="mx-auto mb-8" style="width: 400px;">
        <h1 class="text-4xl text-teal-900 font-bold mb-2">404 Not Found</h1>
        <p class="text-2xl text-gray-300 font-bold mb-2">Whoops! That page doesn't exist.</p>
        <div class="flex justify-center space-x-4">
            <a href="/" class="text-gray-200 hover:underline">Home</a>
            <a href="/profil/{id}" class="text-gray-200 hover:underline">Profile</a>
            <a href="#" class="text-gray-200 hover:underline">Notification</a>
        </div>
        </div>

</body>
</html>
