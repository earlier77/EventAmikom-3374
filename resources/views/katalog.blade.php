<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans">

    <nav class="bg-indigo-600 p-4 mt-0 w-full mb-8 shadow">
        <div class="container mx-auto flex items-center justify-center space-x-4">
            <a href="/" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Home</a>
            <a href="/profil" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Profil</a>
            <a href="/katalog" class="bg-white text-indigo-600 font-semibold px-4 py-2 rounded-lg shadow">Katalog</a>
            <a href="/bantuan" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Bantuan</a>
            <a href="/kontak" class="text-white hover:text-indigo-200 font-semibold px-4 py-2 rounded-lg transition duration-300">Kontak</a>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-slate-800 mb-8">Katalog AmikomEventHub</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <div class="bg-blue-400 h-32 w-full flex items-center justify-center text-white font-bold text-xl">Event 1</div>
                <div class="p-6">
                    <h2 class="font-bold text-xl mb-2">Seminar Teknologi</h2>
                    <p class="text-slate-600 text-sm mb-4">Seminar mengenai perkembangan AI di industri kreatif.</p>
                    <button class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-700 transition w-full">Daftar Sekarang</button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <div class="bg-green-400 h-32 w-full flex items-center justify-center text-white font-bold text-xl">Event 2</div>
                <div class="p-6">
                    <h2 class="font-bold text-xl mb-2">Workshop UI/UX</h2>
                    <p class="text-slate-600 text-sm mb-4">Pelatihan dasar mendesain antarmuka menggunakan Figma.</p>
                    <button class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-700 transition w-full">Daftar Sekarang</button>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <div class="bg-red-400 h-32 w-full flex items-center justify-center text-white font-bold text-xl">Event 3</div>
                <div class="p-6">
                    <h2 class="font-bold text-xl mb-2">Hackathon 2026</h2>
                    <p class="text-slate-600 text-sm mb-4">Kompetisi membuat aplikasi solusi bisnis dalam 48 jam.</p>
                    <button class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-700 transition w-full">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>