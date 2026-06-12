<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create(Event $event)
    {
        $categories = \App\Models\Category::all();

        return view('checkout.create', compact('event', 'categories'));
    }

    public function store(Request $request, Event $event)
    {
        // 1. Validasi input pelanggan
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        // 2. Cek stok tiket
        if ($event->stock <= 0) {
            return back()->with('error', 'Mohon maaf, tiket untuk acara ini sudah habis.');
        }

        // 3. Buat Order ID unik
        $orderId = 'TRX-' . time() . '-' . Str::random(5);

        // 4. Hitung total pembayaran
        $totalPrice = $event->price + 5000;

        // 5. Simpan transaksi ke database
        Transaction::create([
            'event_id' => $event->id,
            'order_id' => $orderId,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price' => $totalPrice,
            'status' => 'Pending',
        ]);

        // 6. Kurangi stok tiket
        $event->decrement('stock');

        // 7. Kembali ke halaman utama
        return redirect('/')->with('success', 'Pesanan berhasil dibuat. Silakan cek panel admin untuk melihat transaksi.');
    }
}