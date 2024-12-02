<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    // Menampilkan daftar dataset
    public function index()
    {
        $datasets = Dataset::all();
        return view('datasets.index', compact('datasets'));
    }

    // Menampilkan form untuk menambahkan dataset
    public function create()
    {
        return view('datasets.create');
    }

    // Menyimpan dataset yang baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'data_type' => 'required|string|max:255',
            'contributor_name' => 'required|string|max:255',
        ]);

        Dataset::create($request->all());

        return redirect()->route('datasets.index')
            ->with('success', 'Dataset berhasil ditambahkan.');
    }

    // Menampilkan detail dataset
    public function show(Dataset $dataset)
    {
        return view('datasets.show', compact('dataset'));
    }

    // Menampilkan form untuk mengedit dataset
    public function edit(Dataset $dataset)
    {
        return view('datasets.edit', compact('dataset'));
    }

    // Memperbarui dataset
    public function update(Request $request, Dataset $dataset)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'data_type' => 'required|string|max:255',
            'contributor_name' => 'required|string|max:255',
        ]);

        $dataset->update($request->all());

        return redirect()->route('datasets.index')
            ->with('success', 'Dataset berhasil diperbarui.');
    }

    // app/Http/Controllers/DatasetController.php

    public function review(Dataset $dataset)
    {
        // Menampilkan tampilan review dengan dataset yang sudah ada
        return view('datasets.review', compact('dataset'));
    }

    public function updateStatus(Request $request, Dataset $dataset)
    {
        // Validasi status yang akan diupdate
        $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        // Update status dataset
        $dataset->status = $request->status;
        $dataset->save();

        return redirect()->route('datasets.index')
            ->with('success', 'Status dataset berhasil diperbarui.');
    }


    // Menghapus dataset
    public function destroy(Dataset $dataset)
    {
        $dataset->delete();
        return redirect()->route('datasets.index')
            ->with('success', 'Dataset berhasil dihapus.');
    }
}
