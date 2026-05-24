<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
        $partners = Partner::when($query, function ($q) use ($query) {
            return $q->where('name', 'LIKE', '%' . $query . '%');
        })->latest()->get();

        return view('admin.partners.index', compact('partners', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:partners,name',
            'logo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:partners,name,' . $partner->id,
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($partner->logo_url) {
                Storage::disk('public')->delete($partner->logo_url);
            }
            $data['logo_url'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo_url) {
            Storage::disk('public')->delete($partner->logo_url);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}
