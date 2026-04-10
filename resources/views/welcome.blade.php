<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans leading-normal tracking-normal flex flex-col min-h-screen">

    <nav class="bg-indigo-600 p-4 w-full shadow">
        <div class="container mx-auto flex items-center justify-center space-x-4">
            <a href="/" class="bg-white text-indigo-600 font-semibold px-4 py-2 rounded-lg shadow">Home</a>
            <a href="/profil" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Profil</a>
            <a href="/katalog" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Katalog</a>
            <a href="/bantuan" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Bantuan</a>
            <a href="/kontak" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Kontak</a>
        </div>
    </nav>

    <div class="flex-grow flex items-center justify-center">
        <div class="bg-white p-10 rounded-xl shadow-lg border border-slate-200 text-center max-w-lg w-full">
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Selamat Datang</h1>
            <p class="text-slate-500 mb-8">Di Aplikasi Amikom Event Hub</p>
            
            <div class="bg-indigo-50 p-6 rounded-lg border border-indigo-100">
                <h2 class="text-xl font-bold text-indigo-700">NAMA : Dzacky Arcaya Rahman</h2>
                <h2 class="text-lg font-semibold text-indigo-600 mt-2">NIM : 24.12.3374</h2>
            </div>
            
            <div class="mt-8">
                <a href="/katalog" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
                    Lihat Katalog Event
                </a>
            </div>
        </div>
    </div>

</body>
</html>