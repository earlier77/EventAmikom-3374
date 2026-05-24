@extends('layouts.admin', ['title' => 'Kelola Kategori'])

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black">Kelola Kategori</h1>
        <p class="text-slate-500 font-medium">Buat dan kelola kategori event di platform ini.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">
        + Tambah Kategori Baru
    </a>
</header>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl flex items-center gap-3">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="font-semibold">{{ session('success') }}</span>
</div>
@endif

@if(session('error'))
<div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl flex items-center gap-3">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="font-semibold">{{ session('error') }}</span>
</div>
@endif

<!-- Search Bar -->
<div class="mb-6">
    <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-4">
        <div class="flex-1 relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama kategori..." class="w-full pl-12 pr-4 py-3 rounded-2xl border border-slate-200 outline-none focus:ring-2 focus:ring-indigo-500 bg-white shadow-sm transition">
        </div>
        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">Cari</button>
        @if(request('q'))
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-slate-200 text-slate-700 rounded-2xl font-bold hover:bg-slate-300 transition">Reset</a>
        @endif
    </form>
</div>

<!-- Table -->
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-20">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Slug</th>
                    <th class="px-8 py-4">Tanggal Dibuat</th>
                    <th class="px-8 py-4 w-40">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($categories as $index => $category)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $index + 1 }}</td>
                    <td class="px-8 py-6">
                        <p class="font-black text-slate-800 text-lg">{{ $category->name }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold">{{ $category->slug }}</span>
                    </td>
                    <td class="px-8 py-6 text-sm text-slate-500">
                        {{ $category->created_at ? $category->created_at->format('d M Y, H:i') : '-' }}
                    </td>
                    <td class="px-8 py-6 flex gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Semua relasi event yang menggunakan kategori ini juga perlu dipastikan.')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-12 text-center text-slate-400 font-medium">Tidak ada data kategori ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
