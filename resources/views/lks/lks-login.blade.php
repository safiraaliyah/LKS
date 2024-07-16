<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('img/bg_login.jpg');">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg max-w-md w-full mx-4 md:mx-auto">
            <div class="flex justify-center mb-4">
                <img src="img/logo_kota.png" alt="Logo" class="w-24 h-24">
            </div>    
            <h1 class="text-3xl font-bold text-center mb-6">Log In LKS</h1>
            <form class="space-y-4" method="POST" action="/login-lks-post">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg" placeholder="Enter your username">
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-lg" placeholder="Enter your password">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>
