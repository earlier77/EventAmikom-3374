<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 min-h-screen overflow-x-hidden">

    <div class="flex min-h-screen w-full">

        <!-- Sidebar -->
        <aside class="w-64 shrink-0 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 min-h-screen">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                    AH
                </div>

                <span class="text-xl font-bold text-white tracking-tight">
                    AmikomEventHub
                </span>
            </div>

            <!-- Menu -->
            <nav class="flex-1 space-y-2">
                <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">
                    Main Menu
                </p>

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
                   {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.events.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
                   {{ request()->routeIs('admin.events.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">
                    Kelola Event
                </a>

                <a href="{{ route('admin.transactions.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
                   {{ request()->routeIs('admin.transactions.*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">
                    Laporan Transaksi
                </a>
            </nav>

            <!-- Logout -->
            <div class="pt-6 border-t border-indigo-800">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white transition font-medium text-left">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>

                        <span>Keluar</span>
                    </button>
                </form>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 min-w-0 p-10 overflow-x-hidden overflow-y-auto">
            @yield('content')
        </main>

    </div>

</body>
</html>