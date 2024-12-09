<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon">
    <title>Welcome to Manajemen Eskul</title>
    @vite('resources/css/app.css')
    
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center text-gray-800" style="background-color: #f4f4f4;">
        <div class="bg-white p-12 rounded-xl shadow-lg max-w-lg w-full text-center">
            <div class="text-center mb-6">
                <img src="{{ asset('/images/logo2.png') }}" alt="Logo" class="h-40 w-auto mx-auto" />
            </div>  
            <h1 class="text-4xl font-extrabold mb-6 text-gray-900">Selamat Datang di Manajemen Eskul</h1>
            
            <p class="text-lg mb-6 text-gray-600">
                Web ini dirancang untuk mempermudah Anda dalam mengelola ekstrakurikuler di sekolah. Temukan berbagai ekskul yang tersedia dan segera daftar untuk mengikuti kegiatan yang Anda minati!
            </p>
            
            <!-- Tombol Daftar Ekskul -->
            <a href="{{ route('login') }}"
               class="inline-block px-8 py-4 bg-gray-800 text-white font-semibold rounded-lg shadow-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:scale-105">
               Segera Daftar Ekskul
            </a>
        </div>
    </div>

</body>

</html>
